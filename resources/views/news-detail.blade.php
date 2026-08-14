<x-layout.app title="{{ $news->title }} - KNEAD TO EAT">
  <x-section.shared.hero newsTitle="{{ $news->title }}" />

  <div class="px-4 pt-6 sm:px-6 sm:pt-8 md:px-8 md:pt-10 lg:px-20 lg:pt-24" data-aos="fade-up" data-aos-offset="60"
    data-aos-duration="400">
    @if ($news->image)
      <img src="{{ asset('uploaded_images/' . $news->image) }}" alt="{{ $news->title }}"
        class="md:h-100 lg:h-140 h-60 w-full rounded-lg object-cover sm:h-80" data-aos="zoom-in" data-aos-delay="100"
        data-aos-duration="500">
    @endif
  </div>

  <div class="lg:px-100 px-4 py-8 sm:px-6 sm:py-10 md:px-8 md:py-12 lg:py-24" data-aos="fade-up" data-aos-offset="50"
    data-aos-duration="400">
    <div class="mx-auto flex flex-col gap-4 sm:gap-6 md:gap-8 lg:gap-10">

      <p class="text-2xl font-bold sm:text-3xl md:text-4xl lg:text-3xl" data-aos="fade-down" data-aos-delay="80"
        data-aos-duration="300">
        {{ $news->title }}</p>

      <div class="prose prose-sm sm:prose-base lg:prose-lg max-w-none" data-aos="fade-up" data-aos-delay="120"
        data-aos-duration="400">
        {!! nl2br(e($news->content)) !!}
      </div>

      <x-ui.button :href="route('news.index')"
        class="mt-6 w-full text-center sm:mt-8 sm:w-auto md:mt-10 md:w-fit lg:mt-20 lg:w-fit" data-aos="fade-up"
        data-aos-delay="150" data-aos-duration="400">BACK
        TO NEWS</x-ui.button>
    </div>
  </div>
</x-layout.app>
