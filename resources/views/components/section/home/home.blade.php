@props([
    'featuredNews' => [],
    'news' => [],
    'galleries' => [],
])

{{-- Hero Section --}}
<div class="flex flex-col items-center gap-8 py-12 lg:my-20 lg:w-1/2 lg:items-start lg:gap-6 xl:px-0" data-aos="fade-up"
  data-aos-duration="400">
  <div class="w-full">
    <div class="lg:w-30 -top-6 mb-8 h-0.5 w-16 bg-gray-900 sm:-top-8 sm:w-20 md:-top-10 md:w-24 lg:h-1"
      data-aos="fade-right" data-aos-delay="100" data-aos-duration="300"></div>
    <p class="lg:leading-14 text-3xl uppercase leading-tight sm:text-4xl md:text-5xl" data-aos="fade-up"
      data-aos-delay="150" data-aos-duration="400">
      Knead <br>
      <span class="font-extrabold uppercase">to Know</span>
    </p>
  </div>
  <p class="text-sm" data-aos="fade-up" data-aos-delay="150" data-aos-duration="400">
    Guess who's rising before the sun even rises? Yes WE! We will make sure that you guys can have the best
    heart-warming bread (both figuratively AND literally) ever made in this town every morning to start your day. Click
    the button below to learn a little bit more about us!
  </p>
  <x-ui.button :href="url('/about')" class="w-full text-center sm:w-auto" data-aos="fade-up" data-aos-delay="200"
    data-aos-duration="400">TENTANG KAMI</x-ui.button>
</div>
</div>

{{-- About Home --}}
<div class="flex items-center justify-center px-4 py-12 sm:px-6 md:px-8" data-aos="fade-up" data-aos-offset="60"
  data-aos-duration="400">
  <div class="flex w-full flex-col gap-6 py-12 text-center sm:gap-8 sm:py-16 md:w-3/4 md:gap-10 md:py-20 lg:w-2/5">
    <p class="text-lg font-bold sm:text-xl" data-aos="fade-down" data-aos-delay="100" data-aos-duration="300">TENTANG
      KAMI</p>
    <p class="text-sm" data-aos="fade-up" data-aos-delay="150" data-aos-duration="400">
      We (well me, since I'm alone lol) are a bakery that has been operating for <strong>30+</strong> YEARS. Our starter
      has been cultivating for at least <strong>4</strong> decades now. So fear not! You will have the best experience
      ever if you buy bread and all kinds of pastry in our store.
    </p>
    <div
      class="lg:bottom-25 lg:w-30 bottom-12 left-0 right-0 mx-auto h-0.5 w-16 bg-gray-900 sm:bottom-16 sm:w-20 md:bottom-20 md:w-24 lg:h-1"
      data-aos="fade-left" data-aos-delay="150" data-aos-duration="300">
    </div>
  </div>
</div>

{{-- Carousel Home --}}
@if ($galleries)
  <div class="lg:px-22 md:px-22 overflow-hidden bg-gray-900 px-4 pb-24 pt-48 sm:px-6"
    style="background-image: url({{ asset('images/foods/background.jpg') }}); background-size: cover; background-position: center;"
    x-data="carousel()"
    x-init="init()"
    @resize.window="handleResize()"
    data-aos="fade-up"
    data-aos-offset="40"
    data-aos-duration="500">

    <div class="relative w-full" data-aos="zoom-in" data-aos-delay="100"
      data-aos-duration="400">
      <div class="relative">
        <!-- Render slides directly in HTML -->
        <div class="flex justify-center gap-2 sm:gap-3">
          <template x-for="(gallery, index) in visibleSlides" :key="index">
            <div class="flex flex-col gap-5 pt-30 relative max-w-70 rounded-2xl bg-gray-50 px-10 py-12 text-center transition duration-150 hover:scale-105 hover:shadow-2xl">
              <p class="flex-1 text-xl font-bold" x-text="gallery.title"></p>
              <p class="flex-1" x-text="gallery.description ? gallery.description.substring(0, 100) : ''"></p>
              <img :src="getImageUrl(gallery.image)" :alt="gallery.title || 'food_png'"
                   class="size-50 absolute left-0 right-0 top-0 mx-auto aspect-square -translate-y-1/2 rounded-full object-cover transition duration-150 hover:scale-110">
            </div>
          </template>
        </div>
      </div>

      <button type="button"
        class="absolute left-0 top-1/2 z-30 flex -translate-y-1/2 cursor-pointer items-center justify-center px-2 transition duration-150 hover:scale-110 sm:px-4"
        @click="changeSlide(-1)"
        data-aos="fade-right" data-aos-delay="200" data-aos-duration="300">
        <span
          class="inline-flex h-8 w-8 items-center justify-center rounded-full bg-gray-50 shadow-lg outline-1 outline-gray-300 transition duration-150 hover:scale-110 hover:shadow-xl sm:h-10 sm:w-10">
          <svg class="h-4 w-4 text-gray-800 sm:h-5 sm:w-5 rtl:rotate-180" aria-hidden="true"
            xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="3"
              d="m15 19-7-7 7-7" />
          </svg>
          <span class="sr-only">Previous</span>
        </span>
      </button>

      <button type="button"
        class="absolute right-0 top-1/2 z-30 flex -translate-y-1/2 cursor-pointer items-center justify-center px-2 transition duration-150 hover:scale-110 sm:px-4"
        @click="changeSlide(1)"
        data-aos="fade-left" data-aos-delay="200" data-aos-duration="300">
        <span
          class="inline-flex h-8 w-8 items-center justify-center rounded-full bg-gray-50 shadow-lg outline-1 outline-gray-300 transition duration-150 hover:scale-110 hover:shadow-xl sm:h-10 sm:w-10">
          <svg class="h-4 w-4 text-gray-800 sm:h-5 sm:w-5 rtl:rotate-180" aria-hidden="true"
            xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="3"
              d="m9 5 7 7-7 7" />
          </svg>
          <span class="sr-only">Next</span>
        </span>
      </button>
    </div>
  </div>

  @php
    $baseUrl = rtrim(asset(''), '/');
  @endphp

  <script>
    function carousel() {
      return {
        galleries: @json($galleries),
        currentSlide: 0,
        itemsPerSlide: 1,
        baseUrl: '{{ $baseUrl }}',

        init() {
          this.updateItemsPerSlide();
          // Force reactive update
          this.$watch('itemsPerSlide', () => {});
        },

        get visibleSlides() {
          if (!this.galleries || this.galleries.length === 0) return [];
          const start = this.currentSlide * this.itemsPerSlide;
          return this.galleries.slice(start, start + this.itemsPerSlide);
        },

        get totalSlides() {
          return Math.ceil(this.galleries.length / this.itemsPerSlide);
        },

        updateItemsPerSlide() {
          const width = window.innerWidth;
          if (width >= 1024) {
            this.itemsPerSlide = 4;
          } else if (width >= 768) {
            this.itemsPerSlide = 2;
          } else {
            this.itemsPerSlide = 1;
          }

          // Reset current slide if out of bounds
          if (this.currentSlide >= this.totalSlides) {
            this.currentSlide = 0;
          }
        },

        handleResize() {
          this.updateItemsPerSlide();
        },

        changeSlide(direction) {
          this.currentSlide = (this.currentSlide + direction + this.totalSlides) % this.totalSlides;
        },

        getImageUrl(image) {
          if (!image) return '';
          if (image.startsWith('http://') || image.startsWith('https://')) {
            return image;
          }
          if (image.startsWith('/')) {
            return this.baseUrl + image;
          }
          return this.baseUrl + '/uploaded_images/' + image;
        }
      }
    }
  </script>
@endif

{{-- News Home --}}
<div class="lg:py-22 bg-gray-200 px-4 py-12 sm:px-6 md:px-8 lg:px-20" data-aos="fade-up" data-aos-offset="40"
  data-aos-duration="400">
  <p class="mb-8 mt-1 text-center text-lg font-bold sm:mb-10 sm:text-xl md:mb-12" data-aos="fade-down"
    data-aos-delay="80" data-aos-duration="300">BERITA KAMI</p>
  <div class="grid grid-cols-1 gap-y-4 sm:grid-cols-2 md:gap-4 lg:grid-cols-4 lg:gap-4">
    @if ($featuredNews)
      <x-ui.card :image="$featuredNews->image" :title="$featuredNews->title" content="{{ Str::limit($featuredNews->content, 500) }}"
        :link="route('news.show', $featuredNews->id)" featured="true" data-aos="fade-up" data-aos-delay="100" data-aos-duration="400" />
    @endif
    @if ($news)
      @foreach ($news as $index => $newsItem)
        <x-ui.card :image="$newsItem->image" :title="$newsItem->title" content="{{ Str::limit($newsItem->content, 100) }}"
          :link="route('news.show', $newsItem->id)" data-aos="fade-up" data-aos-delay="{{ 100 + ($index + 1) * 60 }}"
          data-aos-duration="400" />
      @endforeach
    @else
      <div class="md:my-45 col-span-full my-24 flex items-center justify-center sm:my-32" data-aos="fade-up"
        data-aos-duration="400">
        <p class="text-3xl font-extrabold uppercase sm:text-4xl md:text-5xl">404 Not Found</p>
      </div>
    @endif
  </div>
</div>

{{-- Gallery Home --}}
<div class="lg:py-22 flex flex-col gap-12 px-4 py-12 sm:gap-16 sm:px-6 md:gap-20 md:px-8 lg:px-20" data-aos="fade-up"
  data-aos-offset="40" data-aos-duration="400">
  <p class="text-center text-lg font-bold sm:text-xl" data-aos="fade-down" data-aos-delay="80"
    data-aos-duration="300">GALERI KAMI</p>
  @if ($galleries)
    <div class="grid grid-cols-2 gap-2 md:grid-cols-2 lg:grid-cols-3">
      @foreach ($galleries as $index => $gallery)
        <x-ui.image-card :image="$gallery->image" :alt="$gallery->title" data-aos="zoom-in"
          data-aos-delay="{{ 60 + $index * 50 }}" data-aos-duration="400" />
      @endforeach
    </div>
  @else
    <div class="md:my-45 my-24 flex items-center justify-center sm:my-32" data-aos="fade-up" data-aos-duration="400">
      <p class="text-3xl font-extrabold uppercase sm:text-4xl md:text-5xl">404 Not Found</p>
    </div>
  @endif
  <x-ui.button href="{{ route('gallery.index') }}" class="mx-auto w-full text-center sm:w-auto" data-aos="fade-up"
    data-aos-delay="150" data-aos-duration="400">LIHAT LEBIH
    BANYAK</x-ui.button>
</div>
