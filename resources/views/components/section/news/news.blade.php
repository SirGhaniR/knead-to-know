@props([
    'featuredNews' => [],
    'news' => [],
])

{{-- Featured News --}}
<div
  class="lg:p-22 flex flex-col gap-6 bg-gray-200 p-4 sm:p-6 md:gap-10 md:p-8 md:py-10 lg:h-screen lg:flex-row lg:gap-10"
  data-aos="fade-up" data-aos-offset="60" data-aos-duration="400">
  @if ($featuredNews)
    <x-ui.image-card image="{{ $featuredNews->image }}" aspect="square"
      class="rounded-2xl! md:h-120 w-full shrink-0 transition duration-150 hover:scale-105 lg:w-auto"
      data-aos="fade-right" data-aos-delay="100" data-aos-duration="400" />
    <div class="flex flex-1 flex-col justify-center gap-4 sm:gap-6 lg:gap-10" data-aos="fade-left" data-aos-delay="150"
      data-aos-duration="400">
      <p class="text-2xl font-bold uppercase sm:text-3xl" data-aos="fade-down" data-aos-delay="100"
        data-aos-duration="300">{{ $featuredNews->title }}</p>
      <p class="text-sm" data-aos="fade-up" data-aos-delay="150" data-aos-duration="400">
        {!! nl2br(e(Str::limit($featuredNews->content, 500))) !!}
      </p>
      <x-ui.button :href="route('news.show', $featuredNews->id)" class="w-full sm:w-auto md:w-fit lg:w-fit" data-aos="fade-up" data-aos-delay="200"
        data-aos-duration="400">BACA SELENGKAPNYA</x-ui.button>
    </div>
  @else
    <div class="flex w-full items-center justify-center" data-aos="fade-up" data-aos-duration="400">
      <p class="text-3xl font-extrabold uppercase sm:text-4xl md:text-5xl">404 Not Found</p>
    </div>
  @endif
</div>

{{-- News Card --}}
<div class="px-4 py-12 sm:px-6 md:px-8 lg:px-20 lg:py-14" data-aos="fade-up" data-aos-offset="50"
  data-aos-duration="400">
  <p class="mb-8 mt-1 text-center text-lg font-bold sm:mb-10 sm:text-xl md:mb-12 lg:text-left" data-aos="fade-down"
    data-aos-delay="80" data-aos-duration="300">BERITA LAINNYA</p>
  @if ($news)
    <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-4">
      @foreach ($news as $index => $newsItem)
        <x-ui.card :image="$newsItem->image" :title="$newsItem->title" content="{{ Str::limit($newsItem->content, 150) }}"
          :link="route('news.show', $newsItem->id)" height="h-130" data-aos="fade-up" data-aos-delay="{{ 100 + ($index + 1) * 60 }}"
          data-aos-duration="400" />
      @endforeach
    </div>
  @else
    <div class="md:py-45 flex w-full items-center justify-center py-20 sm:py-32" data-aos="fade-up"
      data-aos-duration="400">
      <p class="text-3xl font-extrabold uppercase sm:text-4xl md:text-5xl">404 Not Found</p>
    </div>
  @endif
</div>
