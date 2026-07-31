@props(['title', 'number'])

<div class="relative flex flex-col gap-4 px-6 py-10 text-center shadow-md outline-1 outline-gray-300">
  <x-ui.section-title title="{{ $title }}" />
  <p class="text-6xl font-bold">{{ $number }}</p>
  <x-ui.divider class="bottom-0 left-0 right-0 mx-auto" />
</div>
