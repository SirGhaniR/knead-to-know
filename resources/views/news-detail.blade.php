<x-layout.app title="{{ $news->title }} - KNEAD TO EAT">
  <x-section.shared.hero newsTitle="{{ $news->title }}" />
  <div class="px-20 pt-24">
    @if ($news->image)
      <img src="{{ asset('uploaded_images/' . $news->image) }}" alt="{{ $news->title }}"
        class="h-140 w-full rounded-lg object-cover">
    @endif
  </div>
  <div class="px-100 py-24">
    <div class="mx-auto flex flex-col gap-10">

      <p class="text-3xl font-bold">{{ $news->title }}</p>

      <div class="prose">
        {!! nl2br(e($news->content)) !!}
      </div>

      <x-ui.button :href="route('news.index')" class="mt-20">BACK TO NEWS</x-ui.button>
    </div>
  </div>
</x-layout.app>
