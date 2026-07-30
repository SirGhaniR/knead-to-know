@props(['href' => '#', 'variant' => 'dark', 'full' => false])

@php
  $variants = [
      'dark' => 'bg-gray-900 text-gray-200',
      'light' => 'bg-gray-200 text-gray-900',
      'yellow' => 'bg-yellow-500 text-gray-900',
  ];

  $classes = 'px-18 py-3 font-bold transition-colors hover:opacity-90';
  $classes .= ' ' . ($variants[$variant] ?? $variants['dark']);
  $classes .= $full ? ' w-full text-center' : ' w-fit';
@endphp

<a href="{{ $href }}" {{ $attributes->merge(['class' => $classes]) }}>
  {{ $slot }}
</a>
