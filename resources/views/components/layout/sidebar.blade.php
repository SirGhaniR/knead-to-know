<nav id="sidebar"
    class="lg:w-2/10 fixed left-0 top-0 z-40 hidden h-screen w-64 border-r border-gray-700 bg-gray-900 transition-transform duration-300 ease-in-out lg:block">
    <div class="flex h-full flex-col overflow-y-auto">
        <a href="{{ route('admin.dashboard') }}"
            class="mb-8 mt-8 text-center px-4 text-xl font-bold uppercase text-gray-50 lg:mb-20 lg:mt-20 lg:text-2xl"><i
                class="fa-solid fa-sliders"></i> Dashboard</a>

        <div class="flex flex-1 flex-col">
            <a href="{{ route('admin.news.index') }}"
                class="w-full px-4 py-3 text-sm font-medium text-gray-50 hover:bg-gray-800 lg:py-4 lg:text-base"><i
                    class="fa-solid fa-newspaper"></i> Berita</a>
            <a href="{{ route('admin.gallery.index') }}"
                class="w-full px-4 py-3 text-sm font-medium text-gray-50 hover:bg-gray-800 lg:py-4 lg:text-base"><i
                    class="fa-solid fa-images"></i> Galeri</a>
            <a href="{{ route('admin.contact.index') }}"
                class="w-full px-4 py-3 text-sm font-medium text-gray-50 hover:bg-gray-800 lg:py-4 lg:text-base"><i
                    class="fa-solid fa-envelope"></i> Kontak</a>
            <a href="{{ route('admin.contact-info.index') }}"
                class="w-full px-4 py-3 text-sm font-medium text-gray-50 hover:bg-gray-800 lg:py-4 lg:text-base"><i
                    class="fa-solid fa-id-card"></i> Info
                Kontak</a>
            <a href="{{ route('home') }}" target="_blank"
                class="w-full px-4 py-3 text-sm font-medium text-gray-50 hover:bg-gray-800 lg:py-4 lg:text-base"><i
                    class="fa-solid fa-rotate-left"></i> Kembali
                ke website</a>
        </div>

        <form action="{{ url('/logout') }}" method="post" class="w-full">
            @csrf
            <button type="submit"
                class="w-full cursor-pointer px-4 py-8 text-left text-sm font-medium text-gray-50 hover:bg-gray-800 md:text-base"><i
                    class="fa-solid fa-arrow-right-from-bracket"></i> Logout</button>
        </form>
    </div>
</nav>

<button data-collapse-toggle="sidebar" type="button"
    class="fixed right-4 top-4 z-50 inline-flex items-center bg-gray-900 p-2 text-sm text-gray-50 hover:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-gray-600 lg:hidden"
    aria-controls="sidebar" aria-expanded="false">
    <span class="sr-only">Open main menu</span>
    <i class="fa-solid fa-bars text-2xl"></i>
</button>
