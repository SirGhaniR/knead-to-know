@props(['icon', 'title', 'description'])

<div {{ $attributes->merge(['class' => 'flex flex-col items-center flex-1 gap-2 sm:gap-3']) }}>
  <img src="{{ asset('images/icons/' . $icon) }}" alt="{{ $title }}-icon"
    class="h-12 w-12 sm:h-16 sm:w-16 md:h-20 md:w-20">
  <p class="text-base font-bold sm:text-lg md:text-xl">{{ $title }}</p>
  <p class="text-center text-sm sm:text-base">{{ $description }}</p>
</div>
