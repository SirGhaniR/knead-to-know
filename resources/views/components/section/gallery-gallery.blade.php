@props([
    'galleries' => [],
])

<div class="py-22 flex flex-col gap-20 px-20">
  @if ($galleries)
    <div class="grid grid-cols-4 gap-2">
      @foreach ($galleries as $gallery)
        <x-ui.image-card :image="$gallery['image']" :alt="$gallery['title']" />
      @endforeach
    </div>
  @endif
  <x-ui.hero-title :title="'404 Not Found'" centered />
</div>
