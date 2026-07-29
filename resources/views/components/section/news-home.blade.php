@php
  $featuredNews = [
      'title' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit.',
      'content' =>
          'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ut fugiat eligendi consectetur id, aliquid corporis ea necessitatibus quisquam quibusdam corrupti nulla quo molestiae odit quidem maiores, cum autem quia incidunt, magni perspiciatis vero expedita! Porro, consequatur odit dolores aperiam repellendus cum nemo, voluptates debitis fugit neque accusamus fuga officiis laboriosam.',
      'image' => 'fathul-abrar-T-qI_MI2EMA-unsplash.jpg',
  ];

  $newsItems = array_fill(0, 4, [
      'title' => 'Lorem, ipsum dolor.',
      'content' =>
          'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Repudiandae sint facilis repellat sequi ad autem!',
      'image' => 'fathul-abrar-T-qI_MI2EMA-unsplash.jpg',
  ]);
@endphp

<div class="py-22 bg-gray-200 px-20">
  <x-ui.section-title title="BERITA KAMI" centered class="mb-12 mt-1" />
  <div class="grid h-screen grid-cols-4 gap-4">
    <x-ui.card :image="$featuredNews['image']" :title="$featuredNews['title']" :excerpt="$featuredNews['content']" :link="url('/news')" featured="true" />

    @foreach ($newsItems as $item)
      <x-ui.card :image="$item['image']" :title="$item['title']" :excerpt="$item['content']" :link="url('/news')" />
    @endforeach
  </div>
</div>
