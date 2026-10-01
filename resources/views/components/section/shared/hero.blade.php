@props(['newsTitle' => 'WELCOME'])

@php
  $currentPath = request()->path();
  $title = match ($currentPath) {
      'about' => 'TENTANG KAMI',
      'news' => 'BERITA KAMI',
      'gallery' => 'GALERI KAMI',
      'contact' => 'KONTAK KAMI',
      default => $newsTitle,
  };
@endphp

<div class="text-gray-50 px-4 md:px-12 lg:px-22"
  style="background-image: url({{ asset('images/foods/background.jpg') }}); background-size: cover; background-position: center;">
  <x-layout.header variant="dark" />

  <div class="flex items-center justify-center pb-24 sm:py-32 md:py-40 lg:justify-start lg:py-48"
    data-aos="fade-up" data-aos-duration="400">
    <p class="text-2xl font-extrabold uppercase transition duration-150 hover:scale-105 sm:text-3xl md:text-4xl lg:text-5xl"
      data-aos="fade-down" data-aos-delay="100" data-aos-duration="400">
      {{ $title }}
    </p>
  </div>
</div>
