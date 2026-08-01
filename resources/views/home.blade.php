<x-layout.app title="Home - TASTY FOOD">
  <x-section.hero-home />
  <x-section.about-home />
  <x-section.news-home :featuredNews="$featuredNews" :news="$news" />
  <x-section.gallery-home :galleries="$galleries" />
</x-layout.app>
