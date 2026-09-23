<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\Gallery;
use App\Models\News;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function stats(Request $request)
    {
        $days = (int) $request->query('days', 30);

        $newsCount = News::count();
        $galleriesCount = Gallery::count();
        $contactsCount = Contact::count();
        $unreadContacts = Contact::where('is_read', false)->count();

        $recentNews = News::latest()->take(5)->get();
        $recentContacts = Contact::latest()->take(5)->get();
        $featuredNews = News::where('is_featured', true)->latest()->take(3)->get();

        $activity = $this->buildActivity($days);

        return response()->json([
            'success' => true,
            'data' => [
                'total_news' => $newsCount,
                'total_gallery' => $galleriesCount,
                'total_contacts' => $contactsCount,
                'unread_contacts' => $unreadContacts,
                'recent_news' => $recentNews,
                'recent_contacts' => $recentContacts,
                'featured_news' => $featuredNews,
                'activity' => $activity,
            ],
        ]);
    }

    private function buildActivity(int $days): array
    {
        $start = Carbon::today()->subDays($days - 1);

        $rows = News::select(DB::raw('DATE(created_at) as date'), DB::raw('COUNT(*) as count'))
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
