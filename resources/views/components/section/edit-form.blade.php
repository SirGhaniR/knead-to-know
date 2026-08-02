{{-- Modified template from flowbite --}}

@props(['type', 'item' => null])

@if ($type == 'news')
  <div class="w-8/10 h-min-screen ml-auto px-20 py-24">
    <div class="bg-neutral-primary-soft border-default shadow-xs border p-6">
      <p class="mb-6 text-2xl font-bold">Edit Berita</p>
      <x-ui.error />
      <form action="{{ route('admin.news.update', $item->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
          <div>
            <label for="title" class="mb-2 block text-sm font-medium">Title</label>
            <input type="text" name="title" id="title"
              class="border-default bg-neutral-secondary-medium w-full border px-4 py-2.5 text-sm focus:outline-none"
              placeholder="Enter news title" required value="{{ old('title', $item->title ?? '') }}">
          </div>
          <div>
            <label for="is_featured" class="mb-2 block text-sm font-medium">Featured</label>
            <select name="is_featured" id="is_featured"
              class="border-default bg-neutral-secondary-medium w-full border px-4 py-2.5 text-sm focus:outline-none">
              <option value="0" {{ old('is_featured', $item->is_featured ?? 0) == 0 ? 'selected' : '' }}>No
              </option>
              <option value="1" {{ old('is_featured', $item->is_featured ?? 0) == 1 ? 'selected' : '' }}>Yes
              </option>
            </select>
          </div>
          <div class="md:col-span-2">
            <label for="content" class="mb-2 block text-sm font-medium">Content</label>
            <textarea name="content" id="content" rows="4"
              class="border-default bg-neutral-secondary-medium w-full border px-4 py-2.5 text-sm focus:outline-none"
              placeholder="Enter news content" required>{{ old('content', $item->content ?? '') }}</textarea>
          </div>
          <div class="md:col-span-2">
            <label for="image" class="mb-2 block text-sm font-medium">Image</label>
            @if ($item && $item->image)
              <div class="mb-2">
                <p class="text-sm text-gray-600">Current image:</p>
                <img src="{{ asset('uploaded_images/' . $item->image) }}" alt="{{ $item->title }}"
                  class="mt-1 h-40 w-40 object-cover outline-1 outline-gray-300">
              </div>
            @endif
            <input type="file" name="image" id="image" accept="image/*"
              class="border-default bg-neutral-secondary-medium w-full border px-4 text-sm focus:outline-none"
              value="{{ old('image') }}">
            <p class="mt-1 text-xs text-gray-500">Leave empty to keep current image</p>
          </div>
        </div>
        <div class="mt-6 flex justify-end gap-3">
          <a href="{{ url()->previous() }}"
            class="inline-block border px-6 py-2.5 text-sm font-medium hover:bg-gray-50">
            Cancel
          </a>
          <button type="submit" class="bg-gray-900 px-6 py-2.5 text-sm font-semibold text-gray-50 hover:bg-gray-600">
            Update News
          </button>
        </div>
      </form>
    </div>
  </div>
@elseif($type == 'gallery')
  <div class="w-8/10 h-min-screen ml-auto px-20 py-24">
    <div class="bg-neutral-primary-soft border-default shadow-xs border p-6">
      <p class="mb-6 text-2xl font-bold">Edit Foto</p>
      <x-ui.error />
      <form action="{{ route('admin.gallery.update', $item->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="grid grid-cols-1 gap-6">
          <div>
            <label for="title" class="mb-2 block text-sm font-medium">Image Title</label>
            <input type="text" name="title" id="title"
              class="border-default bg-neutral-secondary-medium w-full border px-4 py-2.5 text-sm focus:outline-none"
              placeholder="Enter image title" required value="{{ old('title', $item->title ?? '') }}">
          </div>
          <div>
            <label for="image" class="mb-2 block text-sm font-medium">Image File</label>
            @if ($item && $item->image)
              <div class="mb-2">
                <p class="text-sm text-gray-600">Current image:</p>
                <img src="{{ asset('uploaded_images/' . $item->image) }}" alt="{{ $item->title ?? 'Gallery image' }}"
                  class="mt-1 h-40 w-40 object-cover outline-1 outline-gray-300">
              </div>
            @endif
            <input type="file" name="image" id="image" accept="image/*"
              class="border-default bg-neutral-secondary-medium w-full border px-4 text-sm focus:outline-none">
            <p class="mt-1 text-xs text-gray-500">Accepted formats: JPG, PNG, GIF, SVG (Max: 4MB). Leave empty to keep
              current image</p>
          </div>
        </div>
        <div class="mt-6 flex justify-end gap-3">
          <a href="{{ url()->previous() }}"
            class="inline-block border px-6 py-2.5 text-sm font-medium hover:bg-gray-50">
            Cancel
          </a>
          <button type="submit" class="bg-gray-900 px-6 py-2.5 text-sm font-semibold text-gray-50 hover:bg-gray-600">
            Update Image
          </button>
        </div>
      </form>
    </div>
  </div>
@endif
