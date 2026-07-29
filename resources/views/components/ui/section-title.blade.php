@props(['title', 'centered' => false])

@php
  $classes = 'text-xl font-bold';
  $classes .= $centered ? ' text-center' : '';
@endphp

<p {{ $attributes->merge(['class' => $classes]) }}>{{ $title }}</p>
