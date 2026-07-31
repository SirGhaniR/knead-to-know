@props([
    'news' => [],
    'galleries' => [],
    'contacts' => [],
    'unreadContacts' => [],
])

<div class="w-8/10 h-min-screen ml-auto px-20 py-24">
  <p class="mb-20 text-4xl font-bold">Analytics</p>
  <div class="grid grid-cols-4 justify-center gap-10">
    <x-ui.counter-card title="Berita" number="{{ $news }}" />
    <x-ui.counter-card title="Galeri" number="{{ $galleries }}" />
    <x-ui.counter-card title="Kontak" number="{{ $contacts }}" />
    <x-ui.counter-card title="Kontak (Unread)" number="{{ $unreadContacts }}" />
  </div>
</div>
