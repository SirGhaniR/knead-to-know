@props(['variant' => 'default'])

@php
  $isHome = request()->path() === '/';
  $isDark = !$isHome;
@endphp

<div class="{{ $isHome ? 'pt-12 lg:pt-8' : 'pt-12 lg:pt-8' }}">
  <header>
    <nav>
      <div class="flex flex-wrap items-center {{ $isHome ? 'gap-4 md:gap-6 lg:gap-12' : 'justify-between' }}">
        <a class="z-10 text-3xl font-bold {{ $isDark ? 'text-white' : '' }}" href="{{ $isHome ? '#' : url('/') }}">KTK</a>

        <button
          class="inline-flex cursor-pointer items-center p-2 text-sm transition duration-150 focus:outline-none focus:ring-2 focus:ring-gray-200 lg:hidden {{ $isDark ? 'text-white hover:bg-gray-700' : 'text-gray-500 hover:bg-gray-100' }}"
          data-collapse-toggle="{{ $isHome ? 'navbar-home' : 'navbar-other' }}" type="button"
          aria-controls="{{ $isHome ? 'navbar-home' : 'navbar-other' }}" aria-expanded="false">
          <span class="sr-only">Open main menu</span>
          <i class="fa-solid fa-bars h-6 w-6 text-xl" aria-hidden="true"></i>
        </button>

        <div class="menu my-8 w-full lg:flex lg:w-auto lg:items-center"
          id="{{ $isHome ? 'navbar-home' : 'navbar-other' }}">
          <div class="flex flex-col gap-4 lg:flex-row lg:items-center lg:gap-6 xl:gap-12">
            <a class="z-10 text-sm hover:font-semibold {{ $isDark ? 'text-white' : '' }}"
              href="{{ url('/') }}">HOME</a>
            <a class="z-10 text-sm hover:font-semibold {{ $isDark ? 'text-white' : '' }}"
              href="{{ url('/about') }}">TENTANG</a>
            <a class="z-10 text-sm hover:font-semibold {{ $isDark ? 'text-white' : '' }}"
              href="{{ url('/news') }}">BERITA</a>
            <a class="z-10 text-sm hover:font-semibold {{ $isDark ? 'text-white' : '' }}"
              href="{{ url('/gallery') }}">GALERI</a>
            <a class="z-10 text-sm hover:font-semibold {{ $isDark ? 'text-white' : '' }}"
              href="{{ url('/contact') }}">KONTAK</a>
          </div>
        </div>
      </div>
    </nav>
  </header>
</div>
