@props(['type' => 'text', 'name', 'id', 'placeholder' => ''])

<input type="{{ $type }}" name="{{ $name }}" id="{{ $id }}" placeholder="{{ $placeholder }}"
  {{ $attributes->merge(['class' => 'w-full rounded-lg px-4 py-8 outline-1 outline-gray-800']) }}>
