@props([
    'unreadContacts' => 0,
])

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
