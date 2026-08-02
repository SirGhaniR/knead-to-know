<x-layout.app title="Berita - TASTY FOOD">
  <x-section.shared.hero />
  <x-section.news.featured-news :featuredNews="$featuredNews" />
  <x-section.news.news-card :news="$news" />
</x-layout.app>
