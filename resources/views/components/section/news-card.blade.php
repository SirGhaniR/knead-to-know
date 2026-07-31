@props([
    'news' => [],
])

<div class="px-20 py-14">
  <p class="mb-12 mt-1 text-xl font-bold">BERITA LAINNYA</p>
  @if ($news)
    <div class="grid grid-cols-4 gap-4">
      @foreach ($news as $newsItem)
        <x-ui.card :image="$newsItem['image']" :title="$newsItem['title']" :content="$newsItem['content']" :link="url('/news/' . $item['id'])" height="h-130" />
      @endforeach
    </div>
  @endif
  <x-ui.hero-title :title="'404 Not Found'" centered />
</div>
