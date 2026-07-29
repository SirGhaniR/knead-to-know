@php
  $newsItems = array_fill(0, 8, [
      'title' => 'Lorem, ipsum dolor.',
      'content' =>
          'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Repudiandae sint facilis repellat sequi ad autem!',
      'image' => 'fathul-abrar-T-qI_MI2EMA-unsplash.jpg',
  ]);
@endphp

<div class="px-20 py-14">
  <p class="mb-12 mt-1 text-xl font-bold">BERITA LAINNYA</p>
  <div class="grid grid-cols-4 gap-4">
    @foreach ($newsItems as $item)
      <x-ui.card :image="$item['image']" :title="$item['title']" :excerpt="$item['content']" :link="url('/news')" height="h-130" />
    @endforeach
  </div>
</div>
