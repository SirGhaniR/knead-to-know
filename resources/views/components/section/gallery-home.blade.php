@php
  $galleryImages = array_fill(0, 6, 'jonathan-borba-Gkc_xM3VY34-unsplash.jpg');
@endphp

<div class="py-22 flex flex-col gap-20 px-20">
  <x-ui.section-title title="GALERI KAMI" centered />
  <div class="grid grid-cols-3 gap-2">
    @foreach ($galleryImages as $image)
      <x-ui.image-card :image="$image" />
    @endforeach
  </div>
  <x-ui.button :href="url('/gallery')" class="mx-auto">LIHAT LEBIH BANYAK</x-ui.button>
</div>
