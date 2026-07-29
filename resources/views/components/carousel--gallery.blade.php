{{-- Modified template from flowbite --}}

<div class="relative w-full bg-gray-200 px-24 py-20" data-carousel="static">
  <!-- Carousel wrapper -->
  <div class="h-135 relative overflow-hidden rounded-3xl shadow-md">
    <!-- Item 1 -->
    <div class="hidden duration-700 ease-in-out" data-carousel-item>
      <img src="{{ asset('images/foods/ella-olsson-mmnKI8kMxpc-unsplash.jpg') }}"
        class="absolute left-1/2 top-1/2 block w-full -translate-x-1/2 -translate-y-1/2" alt="...">
    </div>
    <!-- Item 2 -->
    <div class="hidden duration-700 ease-in-out" data-carousel-item>
      <img src="{{ asset('images/foods/ella-olsson-mmnKI8kMxpc-unsplash.jpg') }}"
        class="absolute left-1/2 top-1/2 block w-full -translate-x-1/2 -translate-y-1/2" alt="...">
    </div>
    <!-- Item 3 -->
    <div class="hidden duration-700 ease-in-out" data-carousel-item>
      <img src="{{ asset('images/foods/ella-olsson-mmnKI8kMxpc-unsplash.jpg') }}"
        class="absolute left-1/2 top-1/2 block w-full -translate-x-1/2 -translate-y-1/2" alt="...">
    </div>
    <!-- Item 4 -->
    <div class="hidden duration-700 ease-in-out" data-carousel-item>
      <img src="{{ asset('images/foods/ella-olsson-mmnKI8kMxpc-unsplash.jpg') }}"
        class="absolute left-1/2 top-1/2 block w-full -translate-x-1/2 -translate-y-1/2" alt="...">
    </div>
    <!-- Item 5 -->
    <div class="hidden duration-700 ease-in-out" data-carousel-item>
      <img src="{{ asset('images/foods/ella-olsson-mmnKI8kMxpc-unsplash.jpg') }}"
        class="absolute left-1/2 top-1/2 block w-full -translate-x-1/2 -translate-y-1/2" alt="...">
    </div>
  </div>
  <!-- Slider controls -->
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
        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="m9 5 7 7-7 7" />
      </svg>
      <span class="sr-only">Next</span>
    </span>
  </button>
</div>
