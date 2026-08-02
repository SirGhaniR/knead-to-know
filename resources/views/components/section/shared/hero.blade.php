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

<div class="my-45 flex items-center">
  <p class="text-5xl font-extrabold uppercase">{{ $title }}</p>
</div>
</div>
