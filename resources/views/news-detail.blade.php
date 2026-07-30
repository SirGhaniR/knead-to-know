<x-layout.app title="{{ $news->title }} - TASTY FOOD">
  <x-section.hero />
  <div class="container mx-auto px-20 py-24">
    <div class="mx-auto">
      @if ($news->image)
        <img src="{{ asset('uploaded_images/' . $news->image) }}" alt="{{ $news->title }}"
          class="mb-6 h-96 w-full rounded-lg object-cover">
      @endif

      <p class="mb-4 text-3xl font-bold">{{ $news->title }}</p>

      <div class="prose">
        {{ $news->content }}
      </div>

      <div class="mt-8">
        <x-ui.button :href="{{ route('news.index') }}">BACK TO NEWS</x-ui.button>
      </div>
    </div>
  </div>
</x-layout.app>
