@props([
    'news' => 0,
    'galleries' => 0,
    'contacts' => 0,
    'unreadContacts' => 0,
])

<section class="mb-10">
  <p class="mb-4 text-xl font-semibold">Statistik</p>
  <div class="grid grid-cols-4 gap-6">
    <x-ui.counter-card title="Total Berita" number="{{ $news }}" link="{{ route('admin.news.index') }}" />
    <x-ui.counter-card title="Total Galeri" number="{{ $galleries }}" link="{{ route('admin.gallery.index') }}" />
    <x-ui.counter-card title="Total Kontak" number="{{ $contacts }}" link="{{ route('admin.contact.index') }}" />
    <x-ui.counter-card title="Belum Dibaca" number="{{ $unreadContacts }}" link="{{ route('admin.contact.index') }}" />
  </div>
</section>
