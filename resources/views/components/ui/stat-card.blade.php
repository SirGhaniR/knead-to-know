@props(['route', 'label', 'value'])

<a href="{{ $route }}" data-aos="zoom-in">
    <div
        {{ $attributes->merge([
            'class' =>
                'flex flex-col gap-2 px-4 py-6 text-center shadow-md outline-1 outline-gray-300 hover:outline-gray-400 sm:gap-4 sm:px-6 sm:py-10',
        ]) }}>
        <p class="text-xs font-medium text-gray-600 sm:text-sm">{{ $label }}</p>
        <p class="text-2xl font-bold sm:text-3xl">{{ $value }}</p>
        <div class="sm:w-30 mx-auto h-1 w-20 bg-gray-900"></div>
    </div>
</a>
