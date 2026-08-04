{{-- Modified template from Flowbite --}}

@props([
    'news' => [],
    'galleries' => [],
    'contacts' => [],
    'contactInfo' => [],
])

@if ($news)
  <div class="w-8/10 h-min-screen ml-auto px-20 py-24">
    <p class="text-4xl font-bold">Berita - Management</p>
    {{ $slot }}
    <div class="bg-neutral-primary-soft border-default relative overflow-x-auto border">
      <table class="w-full table-auto text-left text-sm rtl:text-right">
        <thead class="bg-neutral-secondary-medium border-default-medium border-b text-sm">
          <tr>
            <th scope="col" class="px-6 py-3">Title</th>
            <th scope="col" class="px-6 py-3">Content</th>
            <th scope="col" class="px-6 py-3">Image</th>
            <th scope="col" class="px-6 py-3">Featured</th>
            <th scope="col" class="px-6 py-3">Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($news as $newsItem)
            <tr
              class="border-default bg-neutral-primary-soft hover:bg-neutral-secondary-medium cursor-pointer border-b">
              <td class="px-6 py-4" data-modal-target="modal-{{ $newsItem->id }}"
                data-modal-toggle="modal-{{ $newsItem->id }}">
                {{ $newsItem->title }}
              </td>
              <td class="px-6 py-4" data-modal-target="modal-{{ $newsItem->id }}"
                data-modal-toggle="modal-{{ $newsItem->id }}">
                {{ Str::limit($newsItem->content, 50) }}
              </td>
              <td class="px-6 py-4" data-modal-target="modal-{{ $newsItem->id }}"
                data-modal-toggle="modal-{{ $newsItem->id }}">
                @if ($newsItem->image)
                  <img src="{{ asset('uploaded_images/' . $newsItem->image) }}"
                    class="h-30 w-30 object-cover outline-1 outline-gray-300">
                @else
                  <span class="text-gray-400">No image</span>
                @endif
              </td>
              <td class="px-6 py-4" data-modal-target="modal-{{ $newsItem->id }}"
                data-modal-toggle="modal-{{ $newsItem->id }}">
                {{ $newsItem->is_featured ? 'Yes' : 'No' }}
              </td>
              <td class="px-6 py-4">
                <div class="flex items-center gap-4">
                  <a href="{{ route('admin.news.edit', $newsItem->id) }}"
                    class="font-semibold text-yellow-300 hover:underline">Edit</a>
                  <form action="{{ route('admin.news.delete', $newsItem->id) }}" method="POST" class="inline"
                    onsubmit="return confirm('Are you sure you want to delete this news?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="font-semibold text-red-400 hover:underline">Delete</button>
                  </form>
                </div>
              </td>
            </tr>

            <x-ui.modal id="{{ $newsItem->id }}" title="Detail Berita" :item="$newsItem" type="news"
              editRoute="admin.news.edit" />
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
@elseif($galleries)
  <div class="w-8/10 h-min-screen ml-auto px-20 py-24">
    <p class="text-4xl font-bold">Galeri - Management</p>
    {{ $slot }}
    <div class="grid grid-cols-1 gap-6 sm:grid-cols-1 lg:grid-cols-2 xl:grid-cols-3">
      @foreach ($galleries as $gallery)
        <div class="bg-neutral-primary-soft cursor-pointer overflow-hidden outline-1 outline-gray-300"
          data-modal-target="modal-{{ $gallery->id }}" data-modal-toggle="modal-{{ $gallery->id }}">
          <div class="aspect-square overflow-hidden bg-gray-200">
            @if ($gallery->image)
              <img src="{{ asset('uploaded_images/' . $gallery->image) }}"
                alt="{{ $gallery->title ?? 'Gallery image' }}" class="h-full w-full object-cover">
            @else
              <div class="flex h-full items-center justify-center text-gray-400">No Image</div>
            @endif
          </div>
          <div class="p-4">
            <h3 class="mb-2 font-medium text-gray-900">{{ $gallery->title ?? 'Untitled' }}</h3>
            <p class="mb-2 text-gray-500">{{ Str::limit($gallery->description, 150) }}</p>
            <div class="mt-4 flex items-center justify-between border-t pt-3">
              <span class="text-xs text-gray-500">{{ $gallery->created_at->format('d M Y') }}</span>
              <div class="flex items-center gap-4">
                <a href="{{ route('admin.gallery.edit', $gallery->id) }}"
                  class="font-semibold text-yellow-300 hover:underline">Edit</a>
                <form action="{{ route('admin.gallery.delete', $gallery->id) }}" method="POST" class="inline"
                  onsubmit="return confirm('Are you sure you want to delete this image?')">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="font-semibold text-red-400 hover:underline">Delete</button>
                </form>
              </div>
            </div>
          </div>
        </div>

        <x-ui.modal id="{{ $gallery->id }}" title="Detail Foto" :item="$gallery" type="gallery"
          editRoute="admin.gallery.edit" />
      @endforeach
    </div>
  </div>
@elseif($contacts)
  <div class="w-8/10 h-min-screen ml-auto px-20 py-24">
    <p class="text-4xl font-bold">Kontak - Management</p>
    {{ $slot }}
    <div class="bg-neutral-primary-soft border-default relative overflow-x-auto border">
      <table class="w-full table-auto text-left text-sm rtl:text-right">
        <thead class="bg-neutral-secondary-medium border-default-medium border-b text-sm">
          <tr>
            <th scope="col" class="px-6 py-3">Name</th>
            <th scope="col" class="px-6 py-3">Email</th>
            <th scope="col" class="px-6 py-3">Subject</th>
            <th scope="col" class="px-6 py-3">Message</th>
            <th scope="col" class="px-6 py-3">Status</th>
            <th scope="col" class="px-6 py-3">Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($contacts as $contact)
            <tr
              class="bg-neutral-primary-soft border-default hover:bg-neutral-secondary-medium {{ !$contact->is_read ? 'bg-yellow-50' : '' }} cursor-pointer border-b"
              data-modal-target="modal-{{ $contact->id }}" data-modal-toggle="modal-{{ $contact->id }}">
              <th scope="row" class="text-heading whitespace-nowrap px-6 py-4">{{ $contact->name }}</th>
              <td class="px-6 py-4">{{ $contact->email }}</td>
              <td class="px-6 py-4">{{ $contact->subject }}</td>
              <td class="px-6 py-4">{{ Str::limit($contact->message, 50) }}</td>
              <td class="px-6 py-4">
                <span
                  class="{{ $contact->is_read ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800' }} px-3 py-1 text-sm">
                  {{ $contact->is_read ? 'Read' : 'Unread' }}
                </span>
              </td>
              <td class="px-6 py-4">
                @if (!$contact->is_read)
                  <form action="{{ route('admin.contact.update', $contact->id) }}" method="POST" class="inline">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="is_read" id="is_read" value="1">
                    <button type="submit" class="font-semibold text-green-500 hover:underline">Mark as Read</button>
                  </form>
                @endif
                <form action="{{ route('admin.contact.delete', $contact->id) }}" method="POST" class="inline"
                  onsubmit="return confirm('Are you sure you want to delete this contact message?')">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="font-semibold text-red-400 hover:underline">Delete</button>
                </form>
              </td>
            </tr>

            <x-ui.modal id="{{ $contact->id }}" title="Detail Pesan" :item="$contact" type="contact"
              showStatus="true" statusField="is_read" statusLabels="['Read', 'Unread']"
              statusColors="['bg-green-100 text-green-800', 'bg-yellow-100 text-yellow-800']" />
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
@elseif($contactInfo)
  <div class="w-8/10 h-min-screen ml-auto px-20 py-24">
    <p class="text-4xl font-bold">Info Kontak - Management</p>
    {{ $slot }}
    <div class="bg-neutral-primary-soft border-default relative overflow-x-auto border">
      <table class="w-full table-auto text-left text-sm rtl:text-right">
        <thead class="bg-neutral-secondary-medium border-default-medium border-b text-sm">
          <tr>
            <th scope="col" class="px-6 py-3">Email</th>
            <th scope="col" class="px-6 py-3">Phone</th>
            <th scope="col" class="px-6 py-3">Address</th>
          </tr>
        </thead>
        <tbody>
          <tr class="bg-neutral-primary-soft border-default hover:bg-neutral-secondary-medium cursor-pointer border-b"
            data-modal-target="modal-{{ $contactInfo->id }}" data-modal-toggle="modal-{{ $contactInfo->id }}">
            <td class="px-6 py-4">{{ $contactInfo->email }}</td>
            <td class="px-6 py-4">{{ $contactInfo->phone }}</td>
            <td class="px-6 py-4">{{ Str::limit($contactInfo->address, 50) }}</td>
          </tr>

          <x-ui.modal id="{{ $contactInfo->id }}" title="Detail Alamat" :item="$contactInfo" type="contact-info" />
        </tbody>
      </table>
    </div>
  </div>
@else
  <div class="w-8/10 h-min-screen ml-auto px-20 py-24">
    <p class="text-5xl font-extrabold uppercase">500 Internal Server Error</p>
  </div>
@endif
