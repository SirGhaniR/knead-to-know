@props(['color' => 'gray-900'])

<div {{ $attributes->merge(['class' => 'w-30 h-1 bg-' . $color]) }}></div>
