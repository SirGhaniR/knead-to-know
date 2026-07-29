@php
  $currentPath = request()->path();
  $title = match ($currentPath) {
      'about' => 'TENTANG KAMI',
      'news' => 'BERITA KAMI',
      'gallery' => 'GALERI KAMI',
      'contact' => 'KONTAK KAMI',
      default => 'WELCOME',
  };
@endphp

<x-ui.hero-title :title="$title" />
</div>
