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

<div class="lg:my-45 my-16 flex items-center justify-center px-4 sm:my-20 md:my-28 lg:justify-start" data-aos="fade-up"
  data-aos-duration="400">
  <p class="text-2xl font-extrabold uppercase transition duration-150 hover:scale-105 sm:text-3xl md:text-4xl lg:text-5xl"
    data-aos="fade-down" data-aos-delay="100" data-aos-duration="400">
    {{ $title }}
  </p>
</div>
</div>
