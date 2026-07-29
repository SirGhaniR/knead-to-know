@props(['icon', 'title', 'description'])

<div {{ $attributes->merge(['class' => 'flex flex-col items-center gap-3']) }}>
  <img src="{{ asset('images/icons/' . $icon) }}" alt="{{ $title }}-icon" class="size-20">
  <p class="text-xl font-bold">{{ $title }}</p>
  <p>{{ $description }}</p>
</div>
