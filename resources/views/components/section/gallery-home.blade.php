@props([
    'galleries' => [],
])

<div class="py-22 flex flex-col gap-20 px-20">
  <x-ui.section-title title="GALERI KAMI" centered />
  @if ($galleries)
    <div class="grid grid-cols-3 gap-2">
      @foreach ($galleries as $gallery)
        <x-ui.image-card :image="$gallery['image']" :alt="$gallery['title']" />
      @endforeach
    </div>
  @else
    <x-ui.hero-title title="404 Not Found" centered />
  @endif
  <x-ui.button href="{{ route('gallery.index') }}" class="mx-auto">LIHAT LEBIH BANYAK</x-ui.button>
</div>
