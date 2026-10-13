@props(['type' => 'text', 'name', 'id', 'placeholder' => ''])

<input id="{{ $id }}" name="{{ $name }}" type="{{ $type }}" value="{{ old($name) }}"
  placeholder="{{ $placeholder }}"
  {{ $attributes->merge(['class' => 'w-full rounded-lg px-4 py-6 lg:py-8 outline-1 outline-gray-800']) }}>
