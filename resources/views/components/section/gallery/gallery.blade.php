@props([
    'galleries' => [],
])

{{-- Carousel --}}
<div class="relative w-full bg-gray-200 px-24 py-20" data-carousel="static">
  @if ($galleries)
    <div class="h-150 relative overflow-hidden rounded-3xl shadow-md">
      @foreach ($galleries as $gallery)
        <div class="hidden duration-700 ease-in-out" data-carousel-item>
          <img src="{{ asset('uploaded_images/' . $gallery['image']) }}"
            class="absolute left-1/2 top-1/2 block w-full -translate-x-1/2 -translate-y-1/2"
            alt="{{ $gallery['title'] }}">
        </div>
      @endforeach
    </div>
    <button type="button"
      class="inset-s-0 left-15 group absolute top-0 z-30 flex h-full cursor-pointer items-center justify-center px-4"
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
      class="inset-e-0 right-15 group absolute top-0 z-30 flex h-full cursor-pointer items-center justify-center px-4 focus:outline-none"
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
  @endif
</div>

{{-- Gallery Gallery --}}
<div class="py-22 flex flex-col gap-20 px-20">
  @if ($galleries)
    <div class="grid grid-cols-4 gap-2">
      @foreach ($galleries as $gallery)
        <x-ui.image-card :image="$gallery['image']" :alt="$gallery['title']" />
      @endforeach
    </div>
  @else
    <div class="my-45 flex items-center">
      <p class="text-5xl font-extrabold uppercase">404 Not Found</p>
    </div>
  @endif
</div>
