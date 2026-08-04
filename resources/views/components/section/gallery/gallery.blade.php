@props([
    'galleries' => [],
])

{{-- Carousel --}}
<div class="relative w-full bg-gray-200 px-4 py-12 sm:px-6 md:px-8 lg:px-24 lg:py-20" data-carousel="static">
  @if ($galleries)
    <div class="lg:h-150 relative h-64 overflow-hidden rounded-3xl shadow-md sm:h-80 md:h-96">
      @foreach ($galleries as $gallery)
        <div class="hidden duration-700 ease-in-out" data-carousel-item>
          <img src="{{ asset('uploaded_images/' . $gallery['image']) }}"
            class="absolute left-1/2 top-1/2 block h-full w-full -translate-x-1/2 -translate-y-1/2 object-cover"
            alt="{{ $gallery['title'] }}">
        </div>
      @endforeach
    </div>
    <button type="button"
      class="lg:left-15 group absolute left-2 top-0 z-30 flex h-full cursor-pointer items-center justify-center px-2 sm:left-4 md:left-8 lg:px-4"
      data-carousel-prev>
      <span
        class="inline-flex h-8 w-8 items-center justify-center rounded-full bg-gray-50 shadow-lg outline-1 outline-gray-300 sm:h-10 sm:w-10">
        <svg class="h-4 w-4 text-gray-800 sm:h-5 sm:w-5 rtl:rotate-180" aria-hidden="true"
          xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="3"
            d="m15 19-7-7 7-7" />
        </svg>
        <span class="sr-only">Previous</span>
      </span>
    </button>
    <button type="button"
      class="lg:right-15 group absolute right-2 top-0 z-30 flex h-full cursor-pointer items-center justify-center px-2 sm:right-4 md:right-8 lg:px-4"
      data-carousel-next>
      <span
        class="inline-flex h-8 w-8 items-center justify-center rounded-full bg-gray-50 shadow-lg outline-1 outline-gray-300 sm:h-10 sm:w-10">
        <svg class="h-4 w-4 text-gray-800 sm:h-5 sm:w-5 rtl:rotate-180" aria-hidden="true"
          xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="3"
            d="m9 5 7 7-7 7" />
        </svg>
        <span class="sr-only">Next</span>
      </span>
    </button>
  @endif
</div>

{{-- Gallery Gallery --}}
<div class="lg:py-22 flex flex-col gap-12 px-4 py-12 sm:gap-16 sm:px-6 md:gap-20 md:px-8 lg:px-20">
  @if ($galleries)
    <div class="grid grid-cols-2 gap-2 sm:grid-cols-3 lg:grid-cols-4">
      @foreach ($galleries as $gallery)
        <x-ui.image-card :image="$gallery['image']" :alt="$gallery['title']" />
      @endforeach
    </div>
  @else
    <div class="md:my-45 my-24 flex items-center justify-center sm:my-32">
      <p class="text-3xl font-extrabold uppercase sm:text-4xl md:text-5xl">404 Not Found</p>
    </div>
  @endif
</div>
