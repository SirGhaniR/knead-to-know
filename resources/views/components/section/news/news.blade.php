@props([
    'featuredNews' => [],
    'news' => [],
])

{{-- Featured News --}}
<div class="p-22 flex h-screen gap-10 bg-gray-200">
  @if ($featuredNews)
    <x-ui.image-card image="{{ $featuredNews['image'] }}" aspect="square" class="rounded-2xl! shrink-0" />
    <div class="flex flex-col justify-center gap-10">
      <p class="text-3xl font-bold uppercase">{{ $featuredNews['title'] }}</p>
      <p class="text-sm">
        {!! nl2br(e(Str::limit($featuredNews->content, 500))) !!}
      </p>
      <x-ui.button :href="route('news.show', $featuredNews['id'])">BACA SELENGKAPNYA</x-ui.button>
    </div>
  @else
    <div class="my-45 flex items-center">
      <p class="text-5xl font-extrabold uppercase">404 Not Found</p>
    </div>
  @endif
</div>

{{-- News Card --}}
<div class="px-20 py-14">
  <p class="mb-12 mt-1 text-xl font-bold">BERITA LAINNYA</p>
  @if ($news)
    <div class="grid grid-cols-4 gap-4">
      @foreach ($news as $newsItem)
        <x-ui.card :image="$newsItem['image']" :title="$newsItem['title']" content="{{ Str::limit($newsItem->content, 150) }}"
          :link="route('news.show', $newsItem['id'])" height="h-130" />
      @endforeach
    </div>
  @else
    <div class="my-45 flex items-center">
      <p class="text-5xl font-extrabold uppercase">404 Not Found</p>
    </div>
  @endif
</div>
