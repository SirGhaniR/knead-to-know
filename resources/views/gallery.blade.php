<x-layout.app title="Galeri - TASTY FOOD">
  <x-section.shared.hero />
  <x-section.gallery.carousel :galleries="$galleries" />
  <x-section.gallery.gallery-gallery :galleries="$galleries" />
</x-layout.app>
