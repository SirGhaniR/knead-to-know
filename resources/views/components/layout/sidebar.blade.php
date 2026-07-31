<nav class="w-2/10 fixed left-0 flex h-screen flex-col items-center bg-gray-900 text-gray-50">
  <x-ui.section-title :title="'Dashboard'" class="mb-20 mt-20 uppercase" />
  <x-navigation.sidebar-link :href="'admin.news.index'">Berita</x-navigation.sidebar-link>
  <x-navigation.sidebar-link :href="'admin.gallery.index'">Galeri</x-navigation.sidebar-link>
  <x-navigation.sidebar-link :href="'admin.contact.index'">Kontak</x-navigation.sidebar-link>
</nav>
