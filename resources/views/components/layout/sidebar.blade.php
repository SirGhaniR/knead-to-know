<nav class="w-2/10 fixed left-0 flex h-screen flex-col items-center bg-gray-900 text-gray-50">
  <a href="{{ route('admin.dashboard') }}" class="mb-20 mt-20 text-2xl font-bold uppercase">Dashboard</a>
  <a href="{{ route('admin.news.index') }}" class="w-full py-4 text-center uppercase hover:bg-gray-800">Berita</a>
  <a href="{{ route('admin.gallery.index') }}" class="w-full py-4 text-center uppercase hover:bg-gray-800">Galeri</a>
  <a href="{{ route('admin.contact.index') }}" class="w-full py-4 text-center uppercase hover:bg-gray-800">Kontak</a>
  <a href="{{ route('admin.contact-info.index') }}" class="w-full py-4 text-center uppercase hover:bg-gray-800">Info
    Kontak</a>
  <a href="{{ route('home') }}" target="_blank" class="w-full py-4 text-center uppercase hover:bg-gray-800">Kembali ke
    website</a>
</nav>
