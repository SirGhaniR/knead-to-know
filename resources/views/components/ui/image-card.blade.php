@props([
    'image' => null,
    'alt' => 'food-photo',
    'aspect' => 'square',
    'imageAsset' => 'brooke-lark-oaz0raysASk-unsplash.jpg',
])

@php
  $aspectClasses = [
      'square' => 'aspect-square',
      '3/4' => 'aspect-3/4',
      '2/1' => 'aspect-2/1',
  ];

  $imageSource = $image ? asset('uploaded_images/' . $image) : asset('images/foods/' . $imageAsset);
@endphp

<img src="{{ $imageSource }}" alt="{{ $alt }}"
  {{ $attributes->merge(['class' => 'rounded-xl shadow-sm outline-1 outline-gray-300 object-cover ' . ($aspectClasses[$aspect] ?? 'aspect-square')]) }}>
