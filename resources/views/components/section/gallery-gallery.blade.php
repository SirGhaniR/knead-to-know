@php
  $galleryImages = array_fill(0, 12, 'jonathan-borba-Gkc_xM3VY34-unsplash.jpg');
@endphp

<div class="py-22 flex flex-col gap-20 px-20">
  <div class="grid grid-cols-4 gap-2">
    @foreach ($galleryImages as $image)
      <x-ui.image-card :image="$image" />
    @endforeach
  </div>
</div>
