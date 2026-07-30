@props([
    'image' => 'one.png',
    'imageAlt' => 'food_png',
    'title' => 'LOREM IPSUM',
    'description' =>
        'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ea, commodi nihil quos autem vero eaque.',
    'imageSize' => 'size-55',
])

<div {{ $attributes->merge(['class' => 'pt-30 relative max-w-70 rounded-2xl bg-gray-50 px-10 py-12 text-center']) }}>
  <p class="mb-5 text-xl font-bold">{{ $title }}</p>
  <p>{{ $description }}</p>
  <img src="{{ asset('images/food_png/' . $image) }}" alt="{{ $imageAlt }}"
    class="{{ $imageSize }} absolute left-0 right-0 top-0 mx-auto -translate-y-1/2">
</div>
