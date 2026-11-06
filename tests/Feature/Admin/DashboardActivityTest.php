<?php

use App\Models\Contact;
use App\Models\Gallery;
use App\Models\News;
use Carbon\Carbon;

describe('activity window', function () {
    beforeEach(function () {
        actingAsAdmin();
        $this->travelTo(Carbon::create(2026, 1, 15, 12, 0, 0));
    });

    it('returns exactly `days` entries for every activity series', function (int $days) {
        $response = $this->get(route('admin.dashboard', ['days' => $days]));
        $response->assertOk();

        $activity = $response->viewData('activity');
        expect($activity)->toHaveKey('news');
        expect($activity)->toHaveKey('gallery');
        expect($activity)->toHaveKey('contact');
        expect($activity['news'])->toHaveCount($days);
        expect($activity['gallery'])->toHaveCount($days);
        expect($activity['contact'])->toHaveCount($days);
    })->with([1, 7, 14, 30, 90]);

    it('clamps the days query param to [1, 90]', function (string $query, int $expected) {
        $response = $this->get(route('admin.dashboard', ['days' => $query]));
        $response->assertOk();

        expect($response->viewData('days'))->toBe($expected);
        expect($response->viewData('activity')['news'])->toHaveCount($expected);
    })->with([
        'zero clamps to 1' => ['0', 1],
        'negative clamps to 1' => ['-5', 1],
        'non-numeric clamps to 1' => ['abc', 1],
        'empty falls back to 30' => ['', 30],
        '200 clamps to 90' => ['200', 90],
        '90 stays 90' => ['90', 90],
        '30 stays 30' => ['30', 30],
    ]);

    it('zero-fills days with no records', function () {
        $response = $this->get(route('admin.dashboard', ['days' => 7]));
        $response->assertOk();

        $news = $response->viewData('activity')['news'];
        expect($news)->toHaveCount(7);
        expect(array_sum(array_column($news, 'count')))->toBe(0);
    });

    it('counts records created today in the last (most recent) entry', function () {
        News::factory()->count(3)->create();

        $response = $this->get(route('admin.dashboard', ['days' => 7]));
        $news = $response->viewData('activity')['news'];

        $last = end($news);
        expect($last['date'])->toBe('2026-01-15');
        expect($last['count'])->toBe(3);
    });

    it('counts records from N days ago into the correct bucket', function () {
        News::factory()->count(2)->create(['created_at' => Carbon::parse('2026-01-12 09:00:00')]);

        $response = $this->get(route('admin.dashboard', ['days' => 7]));
        $news = $response->viewData('activity')['news'];

        $bucket = collect($news)->firstWhere('date', '2026-01-12');
        expect($bucket)->not->toBeNull();
        expect($bucket['count'])->toBe(2);
    });

    it('excludes records older than the window', function () {
        News::factory()->create(['created_at' => Carbon::parse('2026-01-05 10:00:00')]);

        $response = $this->get(route('admin.dashboard', ['days' => 7]));
        $news = $response->viewData('activity')['news'];

        expect(array_sum(array_column($news, 'count')))->toBe(0);
    });

    it('includes records at exactly the start of the window', function () {
        News::factory()->count(2)->create(['created_at' => Carbon::parse('2026-01-09 00:00:00')]);

        $response = $this->get(route('admin.dashboard', ['days' => 7]));
        $news = $response->viewData('activity')['news'];

        $bucket = collect($news)->firstWhere('date', '2026-01-09');
        expect($bucket['count'])->toBe(2);
    });

    it('excludes records at 23:59:59 the day before the window', function () {
        News::factory()->create(['created_at' => Carbon::parse('2026-01-08 23:59:59')]);

        $response = $this->get(route('admin.dashboard', ['days' => 7]));
        $news = $response->viewData('activity')['news'];

        expect(array_sum(array_column($news, 'count')))->toBe(0);
    });

    it('buckets multiple records on the same day together', function () {
        News::factory()->create(['created_at' => Carbon::parse('2026-01-14 08:00:00')]);
        News::factory()->create(['created_at' => Carbon::parse('2026-01-14 12:30:00')]);
        News::factory()->create(['created_at' => Carbon::parse('2026-01-14 22:00:00')]);

        $response = $this->get(route('admin.dashboard', ['days' => 7]));
        $news = $response->viewData('activity')['news'];

        $bucket = collect($news)->firstWhere('date', '2026-01-14');
        expect($bucket['count'])->toBe(3);
    });

    it('keeps news, gallery, and contact series independent', function () {
        News::factory()->count(2)->create();
        Gallery::factory()->count(3)->create();
        Contact::factory()->count(1)->create();

        $response = $this->get(route('admin.dashboard', ['days' => 7]));
        $activity = $response->viewData('activity');

        $today = '2026-01-15';
        $sum = fn ($series) => collect($series)->firstWhere('date', $today)['count'];

        expect($sum($activity['news']))->toBe(2);
        expect($sum($activity['gallery']))->toBe(3);
        expect($sum($activity['contact']))->toBe(1);
    });

    it('returns entries with string date and integer count', function () {
        News::factory()->create();

        $response = $this->get(route('admin.dashboard', ['days' => 3]));
        $news = $response->viewData('activity')['news'];

        foreach ($news as $entry) {
            expect($entry)->toHaveKeys(['date', 'count']);
            expect($entry['date'])->toBeString();
            expect($entry['date'])->toMatch('/^\d{4}-\d{2}-\d{2}$/');
            expect($entry['count'])->toBeInt();
        }
    });

    it('returns entries in chronological order', function () {
        $response = $this->get(route('admin.dashboard', ['days' => 5]));
        $news = $response->viewData('activity')['news'];

        $dates = array_column($news, 'date');
        expect($dates)->toBe(array_values(array_unique($dates)));
        expect($dates)->toBe(collect($dates)->sort()->values()->all());
    });
});
