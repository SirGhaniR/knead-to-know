@props([
    'recentContacts' => [],
])

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
