@props(['image', 'alt' => 'food-photo', 'aspect' => 'square'])

@php
  $aspectClasses = [
      'square' => 'aspect-square',
      '3/4' => 'aspect-3/4',
      '2/1' => 'aspect-2/1',
  ];
@endphp

<img src="{{ asset('uploaded_images/' . $image) }}" alt="{{ $alt }}"
  {{ $attributes->merge(['class' => 'rounded-xl shadow-sm outline-1 outline-gray-300 object-cover ' . ($aspectClasses[$aspect] ?? 'aspect-square')]) }}>
