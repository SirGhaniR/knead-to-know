@props([
    'featuredNews' => [],
])

@if ($featuredNews)
  <section>
    <div class="flex items-center justify-between">
      <p class="mb-4 text-xl font-semibold">Berita Unggulan</p>
      <a href="{{ route('admin.news.index') }}" class="mb-4 text-sm text-gray-600 hover:underline">Lihat semua</a>
    </div>
    <div class="grid grid-cols-3 gap-6">
      @foreach ($featuredNews as $newsItem)
        <div class="bg-neutral-primary-soft border-default shadow-xs overflow-hidden border">
          @if ($newsItem->image)
            <img src="{{ asset('uploaded_images/' . $newsItem->image) }}" alt="{{ $newsItem->title }}"
              class="h-48 w-full object-cover">
          @endif
          <div class="p-4">
            <p class="mb-2 font-medium">{{ $newsItem->title }}</p>
            <p class="mb-3 text-sm text-gray-600">{{ Str::limit($newsItem->content, 80) }}</p>
            <div class="flex items-center gap-3">
              <a href="{{ route('admin.news.edit', $newsItem->id) }}"
                class="text-sm text-yellow-600 hover:underline">Edit</a>
              <span class="text-sm text-gray-300">|</span>
              <span class="text-xs text-gray-500">{{ $newsItem->created_at->format('d M Y') }}</span>
            </div>
          </div>
        </div>
      @endforeach
    </div>
  </section>
@endif
