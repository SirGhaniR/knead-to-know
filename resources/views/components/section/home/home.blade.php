@props([
    'featuredNews' => [],
    'news' => [],
    'galleries' => [],
])

<div class="my-32 flex w-1/2 flex-col gap-6">
  <div class="relative">
    <div class="w-30 absolute -top-10 h-1 bg-gray-900"></div>
    <p class="leading-14 text-5xl">HEALTHY <br>
      <span class="font-extrabold">TASTY FOOD</span>
    </p>
  </div>
  <p class="text-sm">
    Lorem ipsum dolor sit amet consectetur adipisicing elit. Iste nesciunt sed eius, quis, enim possimus explicabo,
    sapiente animi nam saepe tenetur odio obcaecati ad harum eum asperiores ipsum quos. Cumque amet mollitia
    voluptates?
    Aspernatur, cumque.
  </p>
  <x-ui.button :href="url('/about')">TENTANG KAMI</x-ui.button>
</div>
</div>

{{-- About Home --}}
<div class="flex items-center justify-center">
  <div class="relative flex w-2/5 flex-col gap-10 py-20 pb-40 text-center">
    <p class="text-xl font-bold">TENTANG KAMI</p>
    <p>
      Lorem ipsum dolor sit amet consectetur adipisicing elit. Enim amet at laudantium ipsa nisi veniam provident
      dignissimos iure, molestias ipsam reprehenderit minima recusandae
      itaque alias. Temporibus porro rem facere optio!
    </p>
    <div class="bottom-25 w-30 absolute left-0 right-0 mx-auto h-1 bg-gray-900"></div>
  </div>
</div>

{{-- Carousel Home --}}
{{-- @if ($galleries)
  <div class="px-22 pt-46 flex justify-center gap-3 py-24"
    style="background-image: url({{ asset('images/foods/background.jpg') }}); background-size: cover;">
    @foreach ($galleries as $gallery)
      <x-ui.image-description-card :image="$gallery['image']" :title="$gallery['title']" :description="$gallery['description']" />
    @endforeach
  </div>
@endif --}}

{{-- Carousel Home --}}
@if ($galleries)
  <div class="px-22 relative py-48 pb-52"
    style="background-image: url({{ asset('images/foods/background.jpg') }}); background-size: cover;">

    <div id="controls-carousel" class="relative w-full" data-carousel="static">
      <div class="relative flex justify-center py-24">
        @php
          $chunks = $galleries->chunk(4);
        @endphp

        @foreach ($chunks as $chunkIndex => $chunk)
          <div class="{{ $chunkIndex === 0 ? '' : 'hidden' }} flex justify-center gap-3" data-carousel-item>
            @foreach ($chunk as $gallery)
              <x-ui.image-description-card :image="$gallery['image']" :title="$gallery['title']" :description="$gallery['description']" />
            @endforeach
          </div>
        @endforeach
      </div>

      <button type="button"
        class="absolute left-0 top-1/2 z-30 flex -translate-y-1/2 cursor-pointer items-center justify-center px-4"
        data-carousel-prev>
        <span
          class="inline-flex h-10 w-10 items-center justify-center rounded-full bg-gray-50 shadow-lg outline-1 outline-gray-300">
          <svg class="h-5 w-5 text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
            width="24" height="24" fill="none" viewBox="0 0 24 24">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="3"
              d="m15 19-7-7 7-7" />
          </svg>
          <span class="sr-only">Previous</span>
        </span>
      </button>
      <button type="button"
        class="absolute right-0 top-1/2 z-30 flex -translate-y-1/2 cursor-pointer items-center justify-center px-4"
        data-carousel-next>
        <span
          class="inline-flex h-10 w-10 items-center justify-center rounded-full bg-gray-50 shadow-lg outline-1 outline-gray-300">
          <svg class="h-5 w-5 text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
            width="24" height="24" fill="none" viewBox="0 0 24 24">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="3"
              d="m9 5 7 7-7 7" />
          </svg>
          <span class="sr-only">Next</span>
        </span>
      </button>
    </div>
  </div>
@endif

{{-- News Home --}}
<div class="py-22 bg-gray-200 px-20">
  <p class="mb-12 mt-1 text-center text-xl font-bold">BERITA KAMI</p>
  <div class="grid h-screen grid-cols-4 gap-4">
    @if ($featuredNews)
      <x-ui.card :image="$featuredNews['image']" :title="$featuredNews['title']" content="{{ Str::limit($featuredNews['content'], 500) }}"
        :link="route('news.show', $featuredNews['id'])" featured="true" />
    @endif
    @if ($news)
      @foreach ($news as $newsItem)
        <x-ui.card :image="$newsItem['image']" :title="$newsItem['title']" content="{{ Str::limit($newsItem['content'], 100) }}"
          :link="route('news.show', $newsItem['id'])" />
      @endforeach
    @else
      <div class="my-45 flex items-center">
        <p class="text-5xl font-extrabold uppercase">404 Not Found</p>
      </div>
    @endif
  </div>
</div>

{{-- Gallery Home --}}
<div class="py-22 flex flex-col gap-20 px-20">
  <p class="text-center text-xl font-bold">GALERI KAMI</p>
  @if ($galleries)
    <div class="grid grid-cols-3 gap-2">
      @foreach ($galleries as $gallery)
        <x-ui.image-card :image="$gallery['image']" :alt="$gallery['title']" />
      @endforeach
    </div>
  @else
    <div class="my-45 flex items-center">
      <p class="text-5xl font-extrabold uppercase">404 Not Found</p>
    </div>
  @endif
  <x-ui.button href="{{ route('gallery.index') }}" class="mx-auto">LIHAT LEBIH BANYAK</x-ui.button>
</div>
