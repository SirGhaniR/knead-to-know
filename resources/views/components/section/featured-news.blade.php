@props([
    'news' => [],
])

<div class="p-22 flex h-screen gap-10 bg-gray-200">
  @if ($news)
    <x-ui.image-card image="{{ $news['image'] }}" aspect="square" class="rounded-2xl! shrink-0" />
    <div class="flex flex-col justify-center gap-10">
      <p class="text-3xl font-bold">{{ $news['title'] }}</p>
      <p class="text-sm">
        {{ $news['content'] }}
      </p>
      <x-ui.button :href="url('/news/' . $news['id'])">BACA SELENGKAPNYA</x-ui.button>
    </div>
  @endif
  <x-ui.hero-title :title="'404 Not Found'" />
</div>
