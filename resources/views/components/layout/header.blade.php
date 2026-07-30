@php
  $currentPath = request()->path();
  $isHome = $currentPath === '/';

  $navItems = [
      'home' => ['label' => 'HOME', 'url' => route('home')],
      'about' => ['label' => 'TENTANG', 'url' => route('about')],
      'news' => ['label' => 'BERITA', 'url' => route('news.index')],
      'gallery' => ['label' => 'GALERI', 'url' => route('gallery.index')],
      'contact' => ['label' => 'KONTAK', 'url' => route('contact.index')],
  ];
@endphp

@if ($isHome)
  <div class="py-18 relative overflow-hidden bg-gray-200 px-20">
    <header>
      <nav>
        <ul class="flex items-center gap-12">
          <a href="#" class="z-10 text-xl font-bold">TASTY FOOD</a>
          <a href="#" class="z-10">HOME</a>
          <a href="{{ url('/about') }}" class="z-10">TENTANG</a>
          <a href="{{ url('/news') }}" class="z-10">BERITA</a>
          <a href="{{ url('/gallery') }}" class="z-10">GALERI</a>
          <a href="{{ url('/contact') }}" class="z-10">KONTAK</a>
        </ul>
      </nav>
    </header>
    <img src="{{ asset('images/food_png/img-4-2000x2000.png') }}" alt="bg-image"
      class="size-200 translate-x-50 -translate-y-35 absolute right-0 top-0 z-0">
  @else
    <div class="py-18 bg-gray-200 px-20 text-gray-50"
      style="background-image: url({{ asset('images/foods/Group70@2x.png') }}); background-size: cover;">
      <header>
        <nav>
          <ul class="flex items-center justify-between">
            <a href="{{ url('/') }}" class="z-10 text-xl font-bold">TASTY FOOD</a>
            <div class="flex gap-12">
              <a href="{{ url('/') }}" class="z-10">HOME</a>
              <a href="{{ url('#') }}" class="z-10">TENTANG</a>
              <a href="{{ url('/news') }}" class="z-10">BERITA</a>
              <a href="{{ url('/gallery') }}" class="z-10">GALERI</a>
              <a href="{{ url('/contact') }}" class="z-10">KONTAK</a>
            </div>
          </ul>
        </nav>
      </header>
@endif
