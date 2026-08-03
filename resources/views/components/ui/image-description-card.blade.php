@props([
    'image' => 'one.png',
    'imageAlt' => 'food_png',
    'title' => 'LOREM IPSUM',
    'description' =>
        'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ea, commodi nihil quos autem vero eaque.',
    'imageSize' => 'size-50',
])

<div
  {{ $attributes->merge(['class' => 'flex flex-col gap-5 pt-30 relative max-w-70 rounded-2xl bg-gray-50 px-10 py-12 text-center']) }}>
  <p class="flex-1 text-xl font-bold">{{ $title }}</p>
  <p class="flex-1">{{ Str::limit($description, 100) }}</p>
  <img src="{{ asset('uploaded_images/' . $image) }}" alt="{{ $imageAlt }}"
    class="{{ $imageSize }} absolute left-0 right-0 top-0 mx-auto aspect-square -translate-y-1/2 rounded-full object-cover outline-1 outline-gray-300">
</div>
