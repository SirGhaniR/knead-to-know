@props(['name', 'id', 'placeholder' => ''])

<textarea name="{{ $name }}" id="{{ $id }}" placeholder="{{ $placeholder }}"
  {{ $attributes->merge(['class' => 'field-sizing-fixed h-full w-full rounded-lg px-4 py-8 outline-1 outline-gray-800']) }}></textarea>
