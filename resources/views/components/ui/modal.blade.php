@props([
    'id' => '',
    'title' => '',
    'item' => null,
    'type' => 'news',
    'editRoute' => null,
    'imageField' => 'image',
    'imagePath' => 'uploaded_images/',
    'showStatus' => true,
    'statusField' => 'is_featured',
    'statusLabels' => ['Normal', 'Featured'],
    'statusColors' => ['bg-gray-100', 'bg-yellow-100 text-yellow-800'],
])

<div id="modal-{{ $id }}" data-modal-backdrop="static" tabindex="-1" aria-hidden="true"
  class="fixed left-0 right-0 top-0 z-50 hidden h-[calc(100%-1rem)] max-h-full w-full items-center justify-center overflow-y-auto overflow-x-hidden md:inset-0">
  <div class="relative max-h-full w-full max-w-4xl p-4">
    <div class="bg-neutral-primary-soft border-default relative border p-4 shadow-sm md:p-6">
      <div class="border-default flex items-center justify-between border-b pb-4 md:pb-5">
        <h3 class="text-lg font-medium">{{ $title }}</h3>
        <button type="button"
          class="text-body hover:bg-neutral-tertiary hover:text-heading ms-auto inline-flex h-9 w-9 items-center justify-center bg-transparent text-sm"
          data-modal-hide="modal-{{ $id }}">
          <span class="text-2xl">&times;</span>
        </button>
      </div>

      <div class="space-y-4 py-4 md:space-y-6 md:py-6">
        @if ($item && $item->{$imageField})
          <img src="{{ asset($imagePath . $item->{$imageField}) }}"
            class="{{ $type == 'gallery' ? 'h-full' : 'max-h-80' }} w-full object-cover outline-1 outline-gray-300">
        @endif

        @if ($type == 'news')
          <div>
            <p class="text-sm text-gray-500">Title</p>
            <p class="font-bold">{{ $item->title }}</p>
          </div>
          @if ($showStatus)
            <div>
              <p class="text-sm text-gray-500">Status</p>
              <span
                class="{{ $item->{$statusField} ? $statusColors[1] : $statusColors[0] }} inline-block rounded px-3 py-1 text-xs">
                {{ $item->{$statusField} ? $statusLabels[1] : $statusLabels[0] }}
              </span>
            </div>
          @endif
          <div>
            <p class="text-sm text-gray-500">Content</p>
            <div class="mt-1 max-h-60 overflow-y-auto whitespace-pre-wrap p-3 text-sm outline-1 outline-gray-300">
              {{ $item->content }}
            </div>
          </div>
        @endif

        @if ($type == 'gallery')
          <div>
            <p class="text-sm text-gray-500">Title</p>
            <p class="font-bold">{{ $item->title ?? 'Untitled' }}</p>
          </div>
          @if ($item->description)
            <div>
              <p class="text-sm text-gray-500">Description</p>
              <div class="mt-1 max-h-60 overflow-y-auto p-3 text-sm outline-1 outline-gray-300">
                {{ $item->description }}
              </div>
            </div>
          @endif
        @endif

        @if ($type == 'contact')
          <div class="grid grid-cols-2 gap-4">
            <div>
              <p class="text-sm text-gray-500">Name</p>
              <p class="font-bold">{{ $item->name }}</p>
            </div>
            <div>
              <p class="text-sm text-gray-500">Email</p>
              <p class="font-bold">{{ $item->email }}</p>
            </div>
          </div>
          <div>
            <p class="text-sm text-gray-500">Subject</p>
            <p class="font-bold">{{ $item->subject }}</p>
          </div>
          @if ($showStatus)
            <div>
              <p class="text-sm text-gray-500">Status</p>
              <span
                class="{{ $item->is_read ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800' }} inline-block px-3 py-1 text-xs">
                {{ $item->is_read ? 'Read' : 'Unread' }}
              </span>
            </div>
          @endif
          <div>
            <p class="text-sm text-gray-500">Message</p>
            <div class="mt-1 max-h-60 overflow-y-auto whitespace-pre-wrap p-3 text-sm outline-1 outline-gray-300">
              {{ $item->message }}
            </div>
          </div>
        @endif

        @if ($type == 'contact-info')
          <div class="grid grid-cols-2 gap-4">
            <div>
              <p class="text-sm text-gray-500">Email</p>
              <p class="font-bold">{{ $item->email }}</p>
            </div>
          </div>
          <div>
            <p class="text-sm text-gray-500">Phone</p>
            <p class="font-bold">{{ $item->phone }}</p>
          </div>
          <div>
            <p class="text-sm text-gray-500">Address</p>
            <div class="mt-1 max-h-60 overflow-y-auto p-3 text-sm outline-1 outline-gray-300">
              {{ $item->address }}
            </div>
          </div>
        @endif

        <div class="grid grid-cols-2 gap-4 text-sm">
          <div>
            <p class="text-gray-500">Created</p>
            <p>{{ $item->created_at->format('d M Y, H:i') }}</p>
          </div>
          <div>
            <p class="text-gray-500">Updated</p>
            <p>{{ $item->updated_at->format('d M Y, H:i') }}</p>
          </div>
        </div>

        @if ($type == 'contact' && $item->is_read)
          <div>
            <p class="text-sm text-gray-500">Read At</p>
            <p>{{ $item->updated_at->format('d M Y, H:i') }}</p>
          </div>
        @endif
      </div>

      <div class="border-default flex items-center space-x-4 border-t pt-4 md:pt-5">
        @if ($editRoute)
          <a href="{{ route($editRoute, $item->id) }}"
            class="bg-gray-900 px-6 py-2.5 text-sm font-semibold text-gray-50 hover:bg-gray-600">Edit</a>
        @endif

        @if ($type == 'contact' && !$item->is_read)
          <form action="{{ route('admin.contact.update', $item->id) }}" method="POST" class="inline">
            @csrf
            @method('PATCH')
            <button type="submit" class="bg-gray-900 px-6 py-2.5 text-sm font-semibold text-gray-50 hover:bg-gray-600">
              Mark as Read
            </button>
          </form>
        @endif

        <button data-modal-hide="modal-{{ $id }}" type="button"
          class="border px-6 py-2.5 text-sm font-medium hover:bg-gray-50">Close</button>
      </div>
    </div>
  </div>
</div>
