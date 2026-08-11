@props([
    'image' => null,
    'imageAlt' => 'cover-image',
    'title' => null,
    'content' => null,
    'link' => null,
    'linkText' => 'Baca selengkapnya',
    'featured' => false,
    'height' => null,
])

@php
  $cardClasses = 'flex flex-col overflow-hidden rounded-2xl bg-gray-50 shadow-md';
  $cardClasses .= $featured ? ' lg:col-span-2 lg:row-span-2 md:col-span-2' : '';
  $cardClasses .= $height ? ' ' . $height : '';
@endphp

<div {{ $attributes->merge(['class' => $cardClasses]) }}>
  @if ($image)
    <img src="{{ asset('uploaded_images/' . $image) }}" alt="{{ $imageAlt }}" class="aspect-4/3 h-1/2 object-cover">
  @endif
  <div class="flex flex-1 flex-col justify-between p-4">
    @if ($title)
      <p class="mb-6 text-xl font-bold uppercase">{{ $title }}</p>
    @endif
    @if ($content)
      <p class="mb-6">{!! nl2br(e($content)) !!}</p>
    @endif
    @if ($link)
      <div class="mt-auto flex justify-between">
        <a href="{{ $link }}" class="font-semibold text-yellow-500 hover:underline">{{ $linkText }}</a>
      </div>
    @endif
  </div>
  {{ $slot }}
</div>
