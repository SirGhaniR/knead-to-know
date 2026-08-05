{{-- Modified template from Flowbite --}}

@props([
    'news' => [],
    'galleries' => [],
    'contacts' => [],
    'contactInfo' => [],
])

@if ($news)
  <div class="p-4 sm:p-6 lg:ml-auto lg:w-4/5 lg:p-8">
    <div class="w-full">
      <p class="mb-6 text-2xl font-bold sm:text-3xl lg:text-4xl">Berita - Management</p>
      {{ $slot }}
      <div class="bg-neutral-primary-soft border-default relative overflow-x-auto border">
        <table class="w-full table-auto text-left text-sm rtl:text-right">
          <thead class="bg-neutral-secondary-medium border-default-medium border-b text-sm">
            <tr>
              <th scope="col" class="px-4 py-3 sm:px-6">Title</th>
              <th scope="col" class="hidden px-4 py-3 sm:table-cell sm:px-6">Content</th>
              <th scope="col" class="hidden px-4 py-3 sm:px-6 md:table-cell">Image</th>
              <th scope="col" class="hidden px-4 py-3 sm:px-6 lg:table-cell">Featured</th>
              <th scope="col" class="px-4 py-3 sm:px-6">Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($news as $newsItem)
              <tr
                class="border-default bg-neutral-primary-soft hover:bg-neutral-secondary-medium cursor-pointer border-b">
                <td class="px-4 py-3 sm:px-6 sm:py-4" data-modal-target="modal-{{ $newsItem->id }}"
                  data-modal-toggle="modal-{{ $newsItem->id }}">
                  {{ $newsItem->title }}
                </td>
                <td class="hidden px-4 py-3 sm:table-cell sm:px-6 sm:py-4" data-modal-target="modal-{{ $newsItem->id }}"
                  data-modal-toggle="modal-{{ $newsItem->id }}">
                  {{ Str::limit($newsItem->content, 50) }}
                </td>
                <td class="hidden px-4 py-3 sm:px-6 sm:py-4 md:table-cell" data-modal-target="modal-{{ $newsItem->id }}"
                  data-modal-toggle="modal-{{ $newsItem->id }}">
                  @if ($newsItem->image)
                    <img src="{{ asset('uploaded_images/' . $newsItem->image) }}"
                      class="lg:h-30 lg:w-30 h-16 w-16 object-cover outline-1 outline-gray-300 sm:h-20 sm:w-20 md:h-24 md:w-24">
                  @else
                    <span class="text-gray-400">No image</span>
                  @endif
                </td>
                <td class="hidden px-4 py-3 sm:px-6 sm:py-4 lg:table-cell"
                  data-modal-target="modal-{{ $newsItem->id }}" data-modal-toggle="modal-{{ $newsItem->id }}">
                  {{ $newsItem->is_featured ? 'Yes' : 'No' }}
                </td>
                <td class="px-4 py-3 sm:px-6 sm:py-4">
                  <div class="flex flex-col items-start gap-2 sm:flex-row sm:items-center sm:gap-4">
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
  </div>
@elseif($galleries)
  <div class="p-4 sm:p-6 lg:ml-auto lg:w-4/5 lg:p-8">
    <div class="w-full">
      <p class="mb-6 text-2xl font-bold sm:text-3xl lg:text-4xl">Galeri - Management</p>
      {{ $slot }}
      <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 sm:gap-6 lg:grid-cols-3 xl:grid-cols-4">
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
            <div class="p-3 sm:p-4">
              <h3 class="mb-2 text-sm font-medium text-gray-900 sm:text-base">{{ $gallery->title ?? 'Untitled' }}</h3>
              <p class="mb-2 text-xs text-gray-500 sm:text-sm">{{ Str::limit($gallery->description, 100) }}</p>
              <div
                class="mt-3 flex flex-col items-start justify-between gap-2 border-t pt-3 sm:mt-4 sm:flex-row sm:items-center sm:gap-4">
                <span class="text-xs text-gray-500">{{ $gallery->created_at->format('d M Y') }}</span>
                <div class="flex items-center gap-3 sm:gap-4">
                  <a href="{{ route('admin.gallery.edit', $gallery->id) }}"
                    class="text-sm font-semibold text-yellow-300 hover:underline sm:text-base">Edit</a>
                  <form action="{{ route('admin.gallery.delete', $gallery->id) }}" method="POST"
                    class="inline cursor-pointer"
                    onsubmit="return confirm('Are you sure you want to delete this image?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                      class="cursor-pointer text-sm font-semibold text-red-400 hover:underline sm:text-base">Delete</button>
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
  </div>
@elseif($contacts)
  <div class="p-4 sm:p-6 lg:ml-auto lg:w-4/5 lg:p-8">
    <div class="w-full">
      <p class="mb-6 text-2xl font-bold sm:text-3xl lg:text-4xl">Kontak - Management</p>
      {{ $slot }}
      <div class="bg-neutral-primary-soft border-default relative overflow-x-auto border">
        <table class="w-full table-auto text-left text-sm rtl:text-right">
          <thead class="bg-neutral-secondary-medium border-default-medium border-b text-sm">
            <tr>
              <th scope="col" class="px-4 py-3 sm:px-6">Name</th>
              <th scope="col" class="hidden px-4 py-3 sm:table-cell sm:px-6">Email</th>
              <th scope="col" class="hidden px-4 py-3 sm:px-6 md:table-cell">Subject</th>
              <th scope="col" class="hidden px-4 py-3 sm:px-6 lg:table-cell">Message</th>
              <th scope="col" class="px-4 py-3 sm:px-6">Status</th>
              <th scope="col" class="px-4 py-3 sm:px-6">Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($contacts as $contact)
              <tr
                class="bg-neutral-primary-soft border-default hover:bg-neutral-secondary-medium {{ !$contact->is_read ? 'bg-yellow-50' : '' }} cursor-pointer border-b"
                data-modal-target="modal-{{ $contact->id }}" data-modal-toggle="modal-{{ $contact->id }}">
                <th scope="row" class="text-heading whitespace-nowrap px-4 py-3 sm:px-6 sm:py-4">
                  {{ $contact->name }}</th>
                <td class="hidden px-4 py-3 sm:table-cell sm:px-6 sm:py-4">{{ $contact->email }}</td>
                <td class="hidden px-4 py-3 sm:px-6 sm:py-4 md:table-cell">{{ $contact->subject }}</td>
                <td class="hidden px-4 py-3 sm:px-6 sm:py-4 lg:table-cell">{{ Str::limit($contact->message, 50) }}
                </td>
                <td class="px-4 py-3 sm:px-6 sm:py-4">
                  <span
                    class="{{ $contact->is_read ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800' }} px-2 py-1 text-xs sm:px-3 sm:text-sm">
                    {{ $contact->is_read ? 'Read' : 'Unread' }}
                  </span>
                </td>
                <td class="px-4 py-3 sm:px-6 sm:py-4">
                  <div class="flex flex-col items-start gap-2 sm:flex-row sm:items-center sm:gap-3">
                    @if (!$contact->is_read)
                      <form action="{{ route('admin.contact.update', $contact->id) }}" method="POST"
                        class="inline">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="is_read" id="is_read" value="1">
                        <button type="submit"
                          class="text-sm font-semibold text-green-500 hover:underline sm:text-base">Mark Read</button>
                      </form>
                    @endif
                    <form action="{{ route('admin.contact.delete', $contact->id) }}" method="POST" class="inline"
                      onsubmit="return confirm('Are you sure you want to delete this contact message?')">
                      @csrf
                      @method('DELETE')
                      <button type="submit"
                        class="text-sm font-semibold text-red-400 hover:underline sm:text-base">Delete</button>
                    </form>
                  </div>
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
  </div>
@elseif($contactInfo)
  <div class="p-4 sm:p-6 lg:ml-auto lg:w-4/5 lg:p-8">
    <div class="w-full">
      <p class="mb-6 text-2xl font-bold sm:text-3xl lg:text-4xl">Info Kontak - Management</p>
      {{ $slot }}
      <div class="bg-neutral-primary-soft border-default relative overflow-x-auto border">
        <table class="w-full table-auto text-left text-sm rtl:text-right">
          <thead class="bg-neutral-secondary-medium border-default-medium border-b text-sm">
            <tr>
              <th scope="col" class="px-4 py-3 sm:px-6">Email</th>
              <th scope="col" class="hidden px-4 py-3 sm:table-cell sm:px-6">Phone</th>
              <th scope="col" class="px-4 py-3 sm:px-6">Address</th>
            </tr>
          </thead>
          <tbody>
            <tr
              class="bg-neutral-primary-soft border-default hover:bg-neutral-secondary-medium cursor-pointer border-b"
              data-modal-target="modal-{{ $contactInfo->id }}" data-modal-toggle="modal-{{ $contactInfo->id }}">
              <td class="break-all px-4 py-3 sm:px-6 sm:py-4">{{ $contactInfo->email }}</td>
              <td class="hidden px-4 py-3 sm:table-cell sm:px-6 sm:py-4">{{ $contactInfo->phone }}</td>
              <td class="break-all px-4 py-3 sm:px-6 sm:py-4">{{ Str::limit($contactInfo->address, 50) }}</td>
            </tr>

            <x-ui.modal id="{{ $contactInfo->id }}" title="Detail Alamat" :item="$contactInfo" type="contact-info" />
          </tbody>
        </table>
      </div>
    </div>
  </div>
@else
  <div class="p-4 sm:p-6 lg:ml-auto lg:w-4/5 lg:p-8">
    <div class="w-full">
      <p class="text-3xl font-extrabold uppercase sm:text-4xl lg:text-5xl">500 Internal Server Error</p>
    </div>
  </div>
@endif
