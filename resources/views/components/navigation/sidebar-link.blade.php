@props([
    'href' => '#',
])

@php
  $classes = 'w-full py-4 text-center uppercase hover:bg-gray-800';
@endphp

<a href="{{ $href }}" {{ $attributes->merge(['class' => $classes]) }}>{{ $slot }}</a>
