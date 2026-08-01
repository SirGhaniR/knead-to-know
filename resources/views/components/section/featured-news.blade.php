@props([
    'featuredNews' => [],
])

<div class="p-22 flex h-screen gap-10 bg-gray-200">
  @if ($featuredNews)
    <x-ui.image-card image="{{ $featuredNews['image'] }}" aspect="square" class="rounded-2xl! shrink-0" />
    <div class="flex flex-col justify-center gap-10">
      <p class="text-3xl font-bold uppercase">{{ $featuredNews['title'] }}</p>
      <p class="text-sm">
        {!! nl2br(e(Str::limit($featuredNews->content, 500))) !!}
      </p>
      <x-ui.button :href="url('/news/' . $featuredNews['id'])">BACA SELENGKAPNYA</x-ui.button>
    </div>
  @else
    <x-ui.hero-title :title="'404 Not Found'" />
  @endif
</div>
