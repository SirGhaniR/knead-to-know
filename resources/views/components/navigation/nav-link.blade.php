@props(['href' => '#'])

<a href="{{ $href }}" {{ $attributes->merge(['class' => 'z-10']) }}>
  {{ $slot }}
</a>
