{{-- Modified template from Flowbite --}}

@props([
    'news' => [],
    'galleries' => [],
    'contacts' => [],
])

@if ($news)
  <div class="w-8/10 h-min-screen ml-auto px-20 py-24">
    <p class="text-4xl font-bold">Berita - Management</p>
    {{ $slot }}
    <div class="bg-neutral-primary-soft shadow-xs border-default relative overflow-x-auto border">
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
            <tr class="bg-neutral-primary-soft border-default hover:bg-neutral-secondary-medium border-b">
              <th scope="row" class="text-heading whitespace-nowrap px-6 py-4 font-medium">
                {{ $newsItem->title }}
              </th>
              <td class="px-6 py-4">{{ Str::limit($newsItem->content, 50) }}</td>
              <td class="px-6 py-4">
                @if ($newsItem->image)
                  <img src="{{ asset('uploaded_images/' . $newsItem->image) }}" alt="{{ $newsItem->title }}"
                    class="h-16 w-16 object-cover">
                @else
                  <span class="text-gray-400">No image</span>
                @endif
              </td>
              <td class="px-6 py-4">{{ $newsItem->is_featured ? 'Yes' : 'No' }}</td>
              <td class="px-6 py-4">
                <a href="{{ route('admin.news.edit', $newsItem->id) }}"
                  class="font-semibold text-yellow-300 hover:underline">Edit</a>
                <form action="{{ route('admin.news.delete', $newsItem->id) }}" method="POST" class="inline"
                  onsubmit="return confirm('Are you sure you want to delete this news?')">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="font-semibold text-red-400 hover:underline">Delete</button>
                </form>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
@elseif($galleries)
  <div class="w-8/10 h-min-screen ml-auto px-20 py-24">
    <p class="text-4xl font-bold">Gallery - Management</p>
    {{ $slot }}
    <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
      @foreach ($galleries as $gallery)
        <div class="bg-neutral-primary-soft border-default shadow-xs overflow-hidden1 border">
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
            <div class="mt-4 flex items-center justify-end gap-4 border-t pt-3">
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
      @endforeach
    </div>
  </div>
@elseif($contacts)
  <div class="w-8/10 h-min-screen ml-auto px-20 py-24">
    <p class="text-4xl font-bold">Contacts - Management</p>
    {{ $slot }}
    <div class="bg-neutral-primary-soft shadow-xs border-default relative overflow-x-auto border">
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
              class="bg-neutral-primary-soft border-default hover:bg-neutral-secondary-medium {{ !$contact->is_read ? 'font-semibold' : '' }} border-b">
              <th scope="row" class="text-heading whitespace-nowrap px-6 py-4 font-medium">{{ $contact->name }}</th>
              <td class="px-6 py-4">{{ $contact->email }}</td>
              <td class="px-6 py-4">{{ $contact->subject }}</td>
              <td class="px-6 py-4">{{ Str::limit($contact->message, 50) }}</td>
              <td class="px-6 py-4">
                <span
                  class="{{ $contact->is_read ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800' }} rounded-full px-3 py-1 text-xs">
                  {{ $contact->is_read ? 'Read' : 'Unread' }}
                </span>
              </td>
              <td class="px-6 py-4">
                @if (!$contact->is_read)
                  <form action="{{ route('admin.contact.update', $contact->id) }}" method="POST" class="inline">
                    @csrf
                    @method('PATCH')
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
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
@else
  <x-ui.hero-title title="500 Internal Server Error" />
@endif
