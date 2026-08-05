<nav id="sidebar"
  class="lg:w-2/10 fixed left-0 top-0 z-40 hidden h-screen w-64 border-r border-gray-700 bg-gray-900 transition-transform duration-300 ease-in-out lg:block">
  <div class="flex h-full flex-col overflow-y-auto">
    <a href="{{ route('admin.dashboard') }}"
      class="mb-8 mt-8 px-4 text-center text-xl font-bold uppercase text-gray-50 lg:mb-20 lg:mt-20 lg:text-2xl">Dashboard</a>

    <div class="flex flex-1 flex-col items-center text-center">
      <a href="{{ route('admin.news.index') }}"
        class="w-full px-4 py-3 text-sm font-medium uppercase text-gray-50 hover:bg-gray-800 lg:py-4 lg:text-base">Berita</a>
      <a href="{{ route('admin.gallery.index') }}"
        class="w-full px-4 py-3 text-sm font-medium uppercase text-gray-50 hover:bg-gray-800 lg:py-4 lg:text-base">Galeri</a>
      <a href="{{ route('admin.contact.index') }}"
        class="w-full px-4 py-3 text-sm font-medium uppercase text-gray-50 hover:bg-gray-800 lg:py-4 lg:text-base">Kontak</a>
      <a href="{{ route('admin.contact-info.index') }}"
        class="w-full px-4 py-3 text-sm font-medium uppercase text-gray-50 hover:bg-gray-800 lg:py-4 lg:text-base">Info
        Kontak</a>
      <a href="{{ route('home') }}" target="_blank"
        class="w-full px-4 py-3 text-sm font-medium uppercase text-gray-50 hover:bg-gray-800 lg:py-4 lg:text-base">Kembali
        ke website</a>
      <form action="{{ url('/logout') }}" method="post" class="w-full">
        @csrf
        <button type="submit"
          class="w-full px-4 py-3 text-sm font-medium uppercase text-gray-50 hover:bg-gray-800 lg:py-4 lg:text-base">LOGOUT</button>
      </form>
    </div>
  </div>
</nav>

<button data-collapse-toggle="sidebar" type="button"
  class="fixed right-4 top-4 z-50 inline-flex items-center bg-gray-900 p-2 text-sm text-gray-50 hover:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-gray-600 lg:hidden"
  aria-controls="sidebar" aria-expanded="false">
  <span class="sr-only">Open main menu</span>
  <svg class="h-6 w-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
    <path fill-rule="evenodd"
      d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
      clip-rule="evenodd"></path>
  </svg>
</button>
