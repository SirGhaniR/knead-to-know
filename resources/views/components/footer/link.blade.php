@props(['href' => '#'])

<a href="{{ url($href) }}" target="_blank">
  {{ $slot }}
</a>
