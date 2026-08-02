@props([
    'recentNews' => [],
])

<section class="mb-10">
  <div class="flex items-center justify-between">
    <p class="mb-4 text-xl font-semibold">Berita Terbaru</p>
    <a href="{{ route('admin.news.index') }}" class="mb-4 text-sm text-gray-600 hover:underline">Lihat semua</a>
  </div>
  <div class="bg-neutral-primary-soft border-default shadow-xs border">
    @forelse($recentNews as $newsItem)
      <div class="border-default hover:bg-neutral-secondary-medium border-b p-4 last:border-b-0">
        <div class="flex items-center justify-between">
          <div>
            <p class="font-medium">{{ $newsItem->title }}</p>
            <p class="text-sm text-gray-600">{{ $newsItem->created_at->diffForHumans() }}</p>
          </div>
          <div class="flex items-center gap-3">
            @if ($newsItem->is_featured)
              <span class="bg-yellow-100 px-3 py-1 text-xs text-yellow-800">Featured</span>
            @endif
            <a href="{{ route('admin.news.edit', $newsItem->id) }}"
              class="text-sm text-yellow-600 hover:underline">Edit</a>
          </div>
        </div>
      </div>
    @empty
      <div class="p-4 text-center text-gray-500">Belum ada berita</div>
    @endforelse
  </div>
</section>
