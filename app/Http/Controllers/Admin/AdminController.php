<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\Gallery;
use App\Models\News;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $days = (int) $request->query('days', 30);
        $days = max(1, min(90, $days));

        $news = News::count();
        $galleries = Gallery::count();
        $contacts = Contact::count();
        $unreadContacts = Contact::where('is_read', false)->count();

        $recentNews = News::latest()->take(5)->get();
        $recentContacts = Contact::latest()->take(5)->get();
        $featuredNews = News::where('is_featured', true)->latest()->take(3)->get();

        $activity = [
            'news' => $this->buildActivity(News::class, $days),
            'gallery' => $this->buildActivity(Gallery::class, $days),
            'contact' => $this->buildActivity(Contact::class, $days),
        ];

        return view('admins.dashboard', compact(
            'news',
            'galleries',
            'contacts',
            'unreadContacts',
            'recentNews',
            'recentContacts',
            'featuredNews',
            'activity',
            'days'
        ));
    }

    private function buildActivity(string $model, int $days): array
    {
        $start = Carbon::today()->subDays($days - 1);

        $rows = $model::select(
            DB::raw('DATE(created_at) as date'),
            DB::raw('COUNT(*) as count')
        )
            ->where('created_at', '>=', $start)
            ->groupBy('date')
            ->pluck('count', 'date');

        $result = [];
        for ($i = 0; $i < $days; $i++) {
            $date = $start->copy()->addDays($i)->toDateString();
            $result[] = [
                'date' => $date,
                'count' => (int) ($rows[$date] ?? 0),
            ];
        }

        return $result;
    }
}
