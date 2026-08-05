@props([
    'news' => [],
    'galleries' => [],
    'contacts' => [],
    'unreadContacts' => [],
    'recentNews' => [],
    'recentContacts' => [],
    'featuredNews' => [],
])

<div class="mt-14 min-h-screen p-4 sm:p-6 lg:ml-auto lg:w-4/5 lg:p-8">
  <div class="w-full">
    <div class="mb-6 flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between md:mb-10">
      <p class="text-2xl font-bold sm:text-3xl lg:text-4xl">Dashboard</p>
      <div class="flex flex-col gap-3 sm:flex-row">
        <a href="{{ route('admin.news.index') }}"
          class="w-full bg-gray-900 px-6 py-2.5 text-center text-sm font-semibold text-gray-50 hover:bg-gray-600 sm:w-auto">
          + Buat Berita
        </a>
        <a href="{{ route('admin.gallery.index') }}"
          class="w-full border bg-white px-6 py-2.5 text-center text-sm font-medium hover:bg-gray-50 sm:w-auto">
          + Upload Foto
        </a>
      </div>
    </div>

    <section class="mb-6 md:mb-10">
      <p class="mb-4 text-lg font-semibold sm:text-xl">Statistik</p>
      <div class="grid grid-cols-2 gap-4 sm:gap-6 md:grid-cols-4">
        <a href="{{ route('admin.news.index') }}">
          <div
            class="flex flex-col gap-2 px-4 py-6 text-center shadow-md outline-1 outline-gray-300 hover:outline-gray-400 sm:gap-4 sm:px-6 sm:py-10">
            <p class="text-xs font-medium text-gray-600 sm:text-sm">Total Berita</p>
            <p class="text-2xl font-bold sm:text-3xl">{{ $news }}</p>
            <div class="sm:w-30 mx-auto h-1 w-20 bg-gray-900"></div>
          </div>
        </a>
        <a href="{{ route('admin.gallery.index') }}">
          <div
            class="flex flex-col gap-2 px-4 py-6 text-center shadow-md outline-1 outline-gray-300 hover:outline-gray-400 sm:gap-4 sm:px-6 sm:py-10">
            <p class="text-xs font-medium text-gray-600 sm:text-sm">Total Galeri</p>
            <p class="text-2xl font-bold sm:text-3xl">{{ $galleries }}</p>
            <div class="sm:w-30 mx-auto h-1 w-20 bg-gray-900"></div>
          </div>
        </a>
        <a href="{{ route('admin.contact.index') }}">
          <div
            class="flex flex-col gap-2 px-4 py-6 text-center shadow-md outline-1 outline-gray-300 hover:outline-gray-400 sm:gap-4 sm:px-6 sm:py-10">
            <p class="text-xs font-medium text-gray-600 sm:text-sm">Total Kontak</p>
            <p class="text-2xl font-bold sm:text-3xl">{{ $contacts }}</p>
            <div class="sm:w-30 mx-auto h-1 w-20 bg-gray-900"></div>
          </div>
        </a>
        <a href="{{ route('admin.contact.index') }}">
          <div
            class="flex flex-col gap-2 px-4 py-6 text-center shadow-md outline-1 outline-gray-300 hover:outline-gray-400 sm:gap-4 sm:px-6 sm:py-10">
            <p class="text-xs font-medium text-gray-600 sm:text-sm">Belum Dibaca</p>
            <p class="text-2xl font-bold sm:text-3xl">{{ $unreadContacts }}</p>
            <div class="sm:w-30 mx-auto h-1 w-20 bg-gray-900"></div>
          </div>
        </a>
      </div>
    </section>

    <section class="mb-6 md:mb-10">
      <p class="mb-4 text-lg font-semibold sm:text-xl">Aksi Cepat</p>
      <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 sm:gap-6 lg:grid-cols-3">
        <div class="bg-neutral-primary-soft border-default shadow-xs border p-4 sm:p-6">
          <p class="mb-2 font-semibold">Kelola Berita</p>
          <p class="mb-4 text-sm text-gray-600">Tambah, edit, atau hapus berita</p>
          <a href="{{ route('admin.news.index') }}"
            class="inline-block w-full border px-6 py-2 text-center text-sm font-medium hover:bg-gray-50 sm:w-auto">
            Buka Manajemen
          </a>
        </div>
        <div class="bg-neutral-primary-soft border-default shadow-xs border p-4 sm:p-6">
          <p class="mb-2 font-semibold">Kelola Galeri</p>
          <p class="mb-4 text-sm text-gray-600">Upload dan kelola foto galeri</p>
          <a href="{{ route('admin.gallery.index') }}"
            class="inline-block w-full border px-6 py-2 text-center text-sm font-medium hover:bg-gray-50 sm:w-auto">
            Buka Manajemen
          </a>
        </div>
        <div class="bg-neutral-primary-soft border-default shadow-xs border p-4 sm:p-6">
          <p class="mb-2 font-semibold">Kelola Kontak</p>
          <p class="mb-4 text-sm text-gray-600">{{ $unreadContacts }} pesan belum dibaca</p>
          <a href="{{ route('admin.contact.index') }}"
            class="inline-block w-full border px-6 py-2 text-center text-sm font-medium hover:bg-gray-50 sm:w-auto">
            Buka Manajemen
          </a>
        </div>
      </div>
    </section>

    <section class="mb-6 md:mb-10">
      <div class="flex flex-col items-start justify-between gap-2 sm:flex-row sm:items-center">
        <p class="mb-2 text-lg font-semibold sm:mb-4 sm:text-xl">Berita Terbaru</p>
        <a href="{{ route('admin.news.index') }}" class="mb-2 text-sm text-gray-600 hover:underline sm:mb-4">Lihat
          semua</a>
      </div>
      <div class="bg-neutral-primary-soft border-default shadow-xs border">
        @forelse($recentNews as $newsItem)
          <div class="border-default hover:bg-neutral-secondary-medium border-b p-3 last:border-b-0 sm:p-4">
            <div class="flex flex-col items-start justify-between gap-2 sm:flex-row sm:items-center">
              <div>
                <p class="text-sm font-medium sm:text-base">{{ $newsItem->title }}</p>
                <p class="text-xs text-gray-600 sm:text-sm">{{ $newsItem->created_at->diffForHumans() }}</p>
              </div>
              <div class="flex w-full items-center justify-between gap-3 sm:w-auto">
                @if ($newsItem->is_featured)
                  <span class="bg-yellow-100 px-2 py-1 text-xs text-yellow-800 sm:px-3">Featured</span>
                @endif
                <a href="{{ route('admin.news.edit', $newsItem->id) }}"
                  class="text-sm text-yellow-600 hover:underline">Edit</a>
              </div>
            </div>
          </div>
        @empty
          <div class="p-4 text-center text-gray-500">Belum ada berita</div>
        @endforelse
      </div>
    </section>

    <section class="mb-6 md:mb-10">
      <div class="flex flex-col items-start justify-between gap-2 sm:flex-row sm:items-center">
        <p class="mb-2 text-lg font-semibold sm:mb-4 sm:text-xl">Pesan Terbaru</p>
        <a href="{{ route('admin.contact.index') }}" class="mb-2 text-sm text-gray-600 hover:underline sm:mb-4">Lihat
          semua</a>
      </div>
      <div class="bg-neutral-primary-soft border-default shadow-xs border">
        @forelse($recentContacts as $contact)
          <div class="border-default hover:bg-neutral-secondary-medium border-b p-3 last:border-b-0 sm:p-4">
            <div class="flex flex-col items-start justify-between gap-2 sm:flex-row sm:items-center">
              <div>
                <p class="text-sm font-medium sm:text-base">{{ $contact->name }}</p>
                <p class="text-xs text-gray-600 sm:text-sm">{{ Str::limit($contact->subject, 30) }}</p>
                <p class="text-xs text-gray-500">{{ $contact->created_at->diffForHumans() }}</p>
              </div>
              <div>
                @if (!$contact->is_read)
                  <span class="bg-yellow-100 px-2 py-1 text-xs text-yellow-800 sm:px-3">Baru</span>
                @endif
              </div>
            </div>
          </div>
        @empty
          <div class="p-4 text-center text-gray-500">Belum ada pesan</div>
        @endforelse
      </div>
    </section>

    @if ($featuredNews && count($featuredNews) > 0)
      <section>
        <div class="flex flex-col items-start justify-between gap-2 sm:flex-row sm:items-center">
          <p class="mb-2 text-lg font-semibold sm:mb-4 sm:text-xl">Berita Unggulan</p>
          <a href="{{ route('admin.news.index') }}" class="mb-2 text-sm text-gray-600 hover:underline sm:mb-4">Lihat
            semua</a>
        </div>
        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 sm:gap-6 lg:grid-cols-3">
          @foreach ($featuredNews as $newsItem)
            <div class="bg-neutral-primary-soft border-default shadow-xs overflow-hidden border">
              @if ($newsItem->image)
                <img src="{{ asset('uploaded_images/' . $newsItem->image) }}" alt="{{ $newsItem->title }}"
                  class="h-40 w-full object-cover sm:h-48">
              @endif
              <div class="p-3 sm:p-4">
                <p class="mb-2 text-sm font-medium sm:text-base">{{ $newsItem->title }}</p>
                <p class="mb-3 text-xs text-gray-600 sm:text-sm">{{ Str::limit($newsItem->content, 80) }}</p>
                <div class="flex flex-wrap items-center gap-3">
                  <a href="{{ route('admin.news.edit', $newsItem->id) }}"
                    class="text-sm text-yellow-600 hover:underline">Edit</a>
                  <span class="text-sm text-gray-300">|</span>
                  <span class="text-xs text-gray-500">{{ $newsItem->created_at->format('d M Y') }}</span>
                </div>
              </div>
            </div>
          @endforeach
        </div>
      </section>
    @endif
  </div>
</div>
