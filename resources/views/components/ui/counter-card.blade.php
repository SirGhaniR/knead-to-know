@props(['title', 'number', 'link' => '#'])

<a href="{{ $link }}">
  <div
    class="relative flex flex-col gap-4 px-6 py-10 text-center shadow-md outline-1 outline-gray-300 hover:outline-gray-400">
    <p class="text-sm font-medium text-gray-600">{{ $title }}</p>
    <p class="mt-2 text-3xl font-bold">{{ $number }}</p>
    <div class="absolute bottom-0 left-0 right-0 mx-auto h-1 w-30 bg-gray-900"></div>
  </div>
</a>
