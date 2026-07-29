@props(['href' => '#', 'icon', 'alt' => ''])

<a href="{{ $href }}" target="_blank">
  <img src="{{ asset('images/icons/' . $icon) }}" alt="{{ $alt }}" class="size-10">
</a>
