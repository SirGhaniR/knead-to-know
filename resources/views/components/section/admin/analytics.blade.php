@props([
    'news' => [],
    'galleries' => [],
    'contacts' => [],
    'unreadContacts' => [],
    'recentNews' => [],
    'recentContacts' => [],
    'featuredNews' => [],
])

<div class="w-8/10 h-min-screen ml-auto px-20 py-24">
  <div class="mb-10 flex items-center justify-between">
    <p class="text-4xl font-bold">Dashboard</p>
    <div class="flex gap-3">
      <a href="{{ route('admin.news.index') }}"
        class="bg-gray-900 px-6 py-2.5 text-sm font-semibold text-gray-50 hover:bg-gray-600">
        + Buat Berita
      </a>
      <a href="{{ route('admin.gallery.index') }}"
        class="border bg-white px-6 py-2.5 text-sm font-medium hover:bg-gray-50">
        + Upload Foto
      </a>
    </div>
  </div>

  {{-- Stats --}}
  <section class="mb-10">
    <p class="mb-4 text-xl font-semibold">Statistik</p>
    <div class="grid grid-cols-4 gap-6">
      <a href="{{ route('admin.news.index') }}">
        <div
          class="flex flex-col gap-4 px-6 py-10 text-center shadow-md outline-1 outline-gray-300 hover:outline-gray-400">
          <p class="text-sm font-medium text-gray-600">Total Berita</p>
          <p class="mt-2 text-3xl font-bold">{{ $news }}</p>
          <div class="w-30 mx-auto h-1 bg-gray-900"></div>
        </div>
      </a>
      <a href="{{ route('admin.gallery.index') }}">
        <div
          class="flex flex-col gap-4 px-6 py-10 text-center shadow-md outline-1 outline-gray-300 hover:outline-gray-400">
          <p class="text-sm font-medium text-gray-600">Total Galeri</p>
          <p class="mt-2 text-3xl font-bold">{{ $galleries }}</p>
          <div class="w-30 mx-auto h-1 bg-gray-900"></div>
        </div>
      </a>
      <a href="{{ route('admin.contact.index') }}">
        <div
          class="flex flex-col gap-4 px-6 py-10 text-center shadow-md outline-1 outline-gray-300 hover:outline-gray-400">
          <p class="text-sm font-medium text-gray-600">Total Kontak</p>
          <p class="mt-2 text-3xl font-bold">{{ $contacts }}</p>
          <div class="w-30 mx-auto h-1 bg-gray-900"></div>
        </div>
      </a>
      <a href="{{ route('admin.contact.index') }}">
        <div
          class="flex flex-col gap-4 px-6 py-10 text-center shadow-md outline-1 outline-gray-300 hover:outline-gray-400">
          <p class="text-sm font-medium text-gray-600">Belum Dibaca</p>
          <p class="mt-2 text-3xl font-bold">{{ $unreadContacts }}</p>
          <div class="w-30 mx-auto h-1 bg-gray-900"></div>
        </div>
      </a>
    </div>
  </section>

  {{-- Quick Actions --}}
  <section class="mb-10">
    <p class="mb-4 text-xl font-semibold">Aksi Cepat</p>
    <div class="grid grid-cols-3 gap-6">
      <div class="bg-neutral-primary-soft border-default shadow-xs border p-6">
        <p class="mb-2 font-semibold">Kelola Berita</p>
        <p class="mb-4 text-sm text-gray-600">Tambah, edit, atau hapus berita</p>
        <a href="{{ route('admin.news.index') }}"
          class="inline-block border px-6 py-2 text-sm font-medium hover:bg-gray-50">
          Buka Manajemen
        </a>
      </div>
      <div class="bg-neutral-primary-soft border-default shadow-xs border p-6">
        <p class="mb-2 font-semibold">Kelola Galeri</p>
        <p class="mb-4 text-sm text-gray-600">Upload dan kelola foto galeri</p>
        <a href="{{ route('admin.gallery.index') }}"
          class="inline-block border px-6 py-2 text-sm font-medium hover:bg-gray-50">
          Buka Manajemen
        </a>
      </div>
      <div class="bg-neutral-primary-soft border-default shadow-xs border p-6">
        <p class="mb-2 font-semibold">Kelola Kontak</p>
        <p class="mb-4 text-sm text-gray-600">{{ $unreadContacts }} pesan belum dibaca</p>
        <a href="{{ route('admin.contact.index') }}"
          class="inline-block border px-6 py-2 text-sm font-medium hover:bg-gray-50">
          Buka Manajemen
        </a>
      </div>
    </div>
  </section>

  {{-- Recent News --}}
  <section class="mb-10">
    <div class="flex items-center justify-between">
      <p class="mb-4 text-xl font-semibold">Berita Terbaru</p>
      <a href="{{ route('admin.news.index') }}" class="mb-4 text-sm text-gray-600 hover:underline">Lihat semua</a>
    </div>
    <div class="bg-neutral-primary-soft border-default shadow-xs border">
      @forelse($recentNews as $newsItem)
        <div class="border-default hover:bg-neutral-secondary-medium border-b p-4 last:border-b-0">
          <div class="flex items-center justify-between">
            <div>
              <p class="font-medium">{{ $newsItem->title }}</p>
              <p class="text-sm text-gray-600">{{ $newsItem->created_at->diffForHumans() }}</p>
            </div>
            <div class="flex items-center gap-3">
              @if ($newsItem->is_featured)
                <span class="bg-yellow-100 px-3 py-1 text-xs text-yellow-800">Featured</span>
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

  {{-- Recent Contacts --}}
  <section class="mb-10">
    <div class="flex items-center justify-between">
      <p class="mb-4 text-xl font-semibold">Pesan Terbaru</p>
      <a href="{{ route('admin.contact.index') }}" class="mb-4 text-sm text-gray-600 hover:underline">Lihat semua</a>
    </div>
    <div class="bg-neutral-primary-soft border-default shadow-xs border">
      @forelse($recentContacts as $contact)
        <div class="border-default hover:bg-neutral-secondary-medium border-b p-4 last:border-b-0">
          <div class="flex items-center justify-between">
            <div>
              <p class="font-medium">{{ $contact->name }}</p>
              <p class="text-sm text-gray-600">{{ Str::limit($contact->subject, 30) }}</p>
              <p class="text-xs text-gray-500">{{ $contact->created_at->diffForHumans() }}</p>
            </div>
            <div>
              @if (!$contact->is_read)
                <span class="bg-yellow-100 px-3 py-1 text-xs text-yellow-800">Baru</span>
              @endif
            </div>
          </div>
        </div>
      @empty
        <div class="p-4 text-center text-gray-500">Belum ada pesan</div>
      @endforelse
    </div>
  </section>

  {{-- Recent Featured News --}}
  @if ($featuredNews)
    <section>
      <div class="flex items-center justify-between">
        <p class="mb-4 text-xl font-semibold">Berita Unggulan</p>
        <a href="{{ route('admin.news.index') }}" class="mb-4 text-sm text-gray-600 hover:underline">Lihat semua</a>
      </div>
      <div class="grid grid-cols-3 gap-6">
        @foreach ($featuredNews as $newsItem)
          <div class="bg-neutral-primary-soft border-default shadow-xs overflow-hidden border">
            @if ($newsItem->image)
              <img src="{{ asset('uploaded_images/' . $newsItem->image) }}" alt="{{ $newsItem->title }}"
                class="h-48 w-full object-cover">
            @endif
            <div class="p-4">
              <p class="mb-2 font-medium">{{ $newsItem->title }}</p>
              <p class="mb-3 text-sm text-gray-600">{{ Str::limit($newsItem->content, 80) }}</p>
              <div class="flex items-center gap-3">
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
