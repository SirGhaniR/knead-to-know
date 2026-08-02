@props([
    'featuredNews' => [],
    'news' => [],
    'galleries' => [],
])

<div class="my-32 flex w-1/2 flex-col gap-6">
  <div class="relative">
    <div class="w-30 absolute -top-10 h-1 bg-gray-900"></div>
    <p class="leading-14 text-5xl">HEALTHY <br>
      <span class="font-extrabold">TASTY FOOD</span>
    </p>
  </div>
  <p class="text-sm">
    Lorem ipsum dolor sit amet consectetur adipisicing elit. Iste nesciunt sed eius, quis, enim possimus explicabo,
    sapiente animi nam saepe tenetur odio obcaecati ad harum eum asperiores ipsum quos. Cumque amet mollitia
    voluptates?
    Aspernatur, cumque.
  </p>
  <x-ui.button :href="url('/about')">TENTANG KAMI</x-ui.button>
</div>
</div>

{{-- About Home --}}
<div>
  <div class="flex items-center justify-center">
    <div class="relative flex w-2/5 flex-col gap-10 py-20 pb-40 text-center">
      <p class="text-xl font-bold">TENTANG KAMI</p>
      <p>
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Enim amet at laudantium ipsa nisi veniam provident
        dignissimos iure, molestias ipsam reprehenderit minima recusandae
        itaque alias. Temporibus porro rem facere optio!
      </p>
      <div class="bottom-25 w-30 absolute left-0 right-0 mx-auto h-1 bg-gray-900"></div>
    </div>
  </div>
  <div class="px-22 pt-46 flex justify-center gap-3 py-24"
    style="background-image: url({{ asset('images/foods/Group70@2x.png') }}); background-size: cover;">
    <x-ui.image-description-card :image="'one.png'" />
    <x-ui.image-description-card :image="'two.png'" />
    <x-ui.image-description-card :image="'three.png'" />
    <x-ui.image-description-card :image="'four.png'" />
  </div>
</div>

{{-- News Home --}}
<div class="py-22 bg-gray-200 px-20">
  <p class="mb-12 mt-1 text-center text-xl font-bold">BERITA KAMI</p>
  <div class="grid h-screen grid-cols-4 gap-4">
    @if ($featuredNews)
      <x-ui.card :image="$featuredNews['image']" :title="$featuredNews['title']" content="{{ Str::limit($featuredNews['content'], 500) }}"
        :link="route('news.show', $featuredNews['id'])" featured="true" />
    @endif
    @if ($news)
      @foreach ($news as $newsItem)
        <x-ui.card :image="$newsItem['image']" :title="$newsItem['title']" content="{{ Str::limit($newsItem['content'], 100) }}"
          :link="route('news.show', $newsItem['id'])" />
      @endforeach
    @else
      <div class="my-45 flex items-center">
        <p class="text-5xl font-extrabold uppercase">404 Not Found</p>
      </div>
    @endif
  </div>
</div>

{{-- Gallery Home --}}
<div class="py-22 flex flex-col gap-20 px-20">
  <p class="text-center text-xl font-bold">GALERI KAMI</p>
  @if ($galleries)
    <div class="grid grid-cols-3 gap-2">
      @foreach ($galleries as $gallery)
        <x-ui.image-card :image="$gallery['image']" :alt="$gallery['title']" />
      @endforeach
    </div>
  @else
    <div class="my-45 flex items-center">
      <p class="text-5xl font-extrabold uppercase">404 Not Found</p>
    </div>
  @endif
  <x-ui.button href="{{ route('gallery.index') }}" class="mx-auto">LIHAT LEBIH BANYAK</x-ui.button>
</div>
