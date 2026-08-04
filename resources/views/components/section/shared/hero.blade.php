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

<div class="lg:my-45 my-16 flex items-center justify-center px-4 sm:my-20 md:my-28 lg:justify-start">
  <p class="text-2xl font-extrabold uppercase sm:text-3xl md:text-4xl lg:text-5xl">
    {{ $title }}
  </p>
</div>
</div>
