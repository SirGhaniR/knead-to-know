@props([
    'galleries' => [],
])

<div class="py-22 flex flex-col gap-20 px-20">
  <x-ui.section-title title="GALERI KAMI" centered />
  @if ($galleries)
    <div class="grid grid-cols-3 gap-2">
      @foreach ($galleries as $gallery)
        <x-ui.image-card :image="$gallery" />
      @endforeach
    </div>
  @endif
  <x-ui.hero-title title="404 Not Found" centered />
  <x-ui.button href="{{ asset('gallery.index') }}" class="mx-auto">LIHAT LEBIH BANYAK</x-ui.button>
</div>
