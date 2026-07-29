@props(['href' => '#', 'color' => 'yellow'])

@php
  $colors = [
      'yellow' => 'text-yellow-500',
      'dark' => 'text-gray-900',
      'white' => 'text-white',
  ];
@endphp

<a href="{{ $href }}"
  {{ $attributes->merge(['class' => 'font-semibold ' . ($colors[$color] ?? $colors['yellow'])]) }}>
  {{ $slot }}
</a>
