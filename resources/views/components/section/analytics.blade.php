@props([
    'news' => [],
    'galleries' => [],
    'contacts' => [],
    'unreadContacts' => [],
    'recentNews' => [],
    'recentContacts' => [],
    'featuredNews' => [],
])

<div class="w-8/10 h-min-screen ml-auto px-20 py-24">
  <div class="mb-10 flex items-center justify-between">
    <p class="text-4xl font-bold">Dashboard</p>
    <div class="flex gap-3">
      <a href="{{ route('admin.news.index') }}"
        class="bg-gray-900 px-6 py-2.5 text-sm font-semibold text-gray-50 hover:bg-gray-600">
        + Buat Berita
      </a>
      <a href="{{ route('admin.gallery.index') }}"
        class="border bg-white px-6 py-2.5 text-sm font-medium hover:bg-gray-50">
        + Upload Foto
      </a>
    </div>
  </div>

  <x-section.stats :news="$news" :galleries="$galleries" :contacts="$contacts" :unreadContacts="$unreadContacts" />
  <x-section.quick-actions :unreadContacts="$unreadContacts" />
  <x-section.recent-news :recentNews="$recentNews" />
  <x-section.recent-contacts :recentContacts="$recentContacts" />
  <x-section.recent-featured-news :featuredNews="$featuredNews" />
</div>
