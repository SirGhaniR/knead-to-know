<x-layout.app title="Home - TASTY FOOD">
  <x-section.home.hero-home />
  <x-section.home.about-home />
  <x-section.home.news-home :featuredNews="$featuredNews" :news="$news" />
  <x-section.home.gallery-home :galleries="$galleries" />
</x-layout.app>
