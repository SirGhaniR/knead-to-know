<div class="py-22 bg-gray-200 px-20">
  <p class="mb-12 mt-1 text-center text-xl font-bold">BERITA KAMI</p>
  <div class="grid h-screen grid-cols-4 gap-4">
    <div class="col-span-2 row-span-2 flex flex-col overflow-hidden rounded-2xl bg-gray-50 shadow-md">
      <img src="{{ asset('images/foods/fathul-abrar-T-qI_MI2EMA-unsplash.jpg') }}" alt="cover-image"
        class="h-1/2 w-full object-cover">
      <div class="flex flex-1 flex-col justify-between p-4">
        <p class="mb-6 text-xl font-bold uppercase">Lorem ipsum dolor sit, amet consectetur adipisicing elit.</p>
        <p>
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Ut fugiat eligendi consectetur id, aliquid corporis
          ea necessitatibus quisquam quibusdam corrupti nulla quo molestiae odit quidem maiores, cum autem quia
          incidunt, magni perspiciatis vero expedita! Porro, consequatur odit dolores aperiam repellendus cum nemo,
          voluptates debitis fugit neque accusamus fuga officiis laboriosam.
        </p>
        <div class="mt-auto flex justify-between">
          <a href="{{ url('/news') }}" class="font-semibold text-yellow-500">Baca selengkapnya</a>
        </div>
      </div>
    </div>

    <div class="flex flex-col overflow-hidden rounded-2xl bg-gray-50 shadow-md">
      <img src="{{ asset('images/foods/fathul-abrar-T-qI_MI2EMA-unsplash.jpg') }}" alt="cover-image"
        class="h-1/2 w-full object-cover">
      <div class="flex flex-1 flex-col justify-between p-4">
        <p class="mb-6 text-xl font-bold uppercase">Lorem, ipsum dolor.</p>
        <p>
          Lorem ipsum dolor, sit amet consectetur adipisicing elit. Repudiandae sint facilis repellat sequi ad autem!
        </p>
        <div class="mt-auto flex justify-between">
          <a href="{{ url('/news') }}" class="font-semibold text-yellow-500">Baca selengkapnya</a>
        </div>
      </div>
    </div>
  </div>
</div>
