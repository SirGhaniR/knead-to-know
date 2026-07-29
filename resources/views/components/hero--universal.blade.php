<div class="my-45 flex items-center">
  <p class="text-5xl font-extrabold">
    @switch(request()->path())
      @case('about')
        TENTANG KAMI
      @break

      @case('news')
        BERITA KAMI
      @break

      @case('gallery')
        GALERI KAMI
      @break

      @case('contact')
        KONTAK KAMI
      @break

      @default
        WELCOME
    @endswitch
  </p>
</div>
</div>
