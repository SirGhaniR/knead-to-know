<?php

use App\Models\ContactInfo;
use App\Models\Gallery;
use App\Models\News;

describe('empty database', function () {
    it('loads home with no data', function () {
        $this->get('/')->assertOk();
    });

    it('loads about with no data', function () {
        $this->get('/about')->assertOk();
    });

    it('loads gallery with no data', function () {
        $this->get('/gallery')->assertOk();
    });

    it('loads news index with no data', function () {
        $this->get('/news')->assertOk();
    });

    it('loads contact with no data', function () {
        $this->get('/contact')->assertOk();
    });
});

describe('with data', function () {
    beforeEach(function () {
        ContactInfo::factory()->create();
    });

    it('loads home with seeded data', function () {
        News::factory()->featured()->create();
        News::factory()->count(3)->create();
        Gallery::factory()->count(4)->withDescription()->create();

        $this->get('/')->assertOk();
    });

    it('shows the news detail page', function () {
        $news = News::factory()->create();

        $this->get("/news/{$news->id}")
            ->assertOk()
            ->assertSee($news->title);
    });

    it('returns 404 for a missing news detail', function () {
        $this->get('/news/99999')->assertNotFound();
    });

    it('loads gallery with items', function () {
        Gallery::factory()->count(5)->create();
        $this->get('/gallery')->assertOk();
    });
});
