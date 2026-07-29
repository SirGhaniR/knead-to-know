@props(['title'])

<div class="flex flex-1 flex-col gap-6">
  <p class="text-lg font-semibold">{{ $title }}</p>
  {{ $slot }}
</div>
