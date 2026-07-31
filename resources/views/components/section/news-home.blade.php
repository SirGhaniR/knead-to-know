@props([
    'featuredNews' => [],
    'news' => [],
])

<div class="py-22 bg-gray-200 px-20">
  <x-ui.section-title title="BERITA KAMI" centered class="mb-12 mt-1" />
  <div class="grid h-screen grid-cols-4 gap-4">
    @if ($featuredNews)
      <x-ui.card :image="$featuredNews['image']" :title="$featuredNews['title']" :content="$featuredNews['content']" :link="url('news.index')" featured="true" />
    @endif
    @if ($news)
      @foreach ($news as $newsItem)
        <x-ui.card :image="$newsItem['image']" :title="$newsItem['title']" :content="$newsItem['content']" :link="url('news.index')" />
      @endforeach
    @endif
    <x-ui.hero-title title="404 Not Found" centered />
  </div>
</div>
