{{-- Modified template from Flowbite --}}

@props(['type'])

@if ($type == 'news')
  <div class="my-10">
    <div class="bg-neutral-primary-soft border-default shadow-xs border p-6">
      <p class="mb-6 text-2xl font-bold">Create New News</p>
      <x-ui.error />
      <form action="{{ route('admin.news.create') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
          <div>
            <label for="title" class="mb-2 block text-sm font-medium">Title</label>
            <input type="text" name="title" id="title"
              class="border-default bg-neutral-secondary-medium w-full border px-4 py-2.5 text-sm focus:outline-none"
              placeholder="Enter news title" required value="{{ old('title') }}">
          </div>
          <div>
            <label for="is_featured" class="mb-2 block text-sm font-medium">Featured</label>
            <select name="is_featured" id="is_featured"
              class="border-default bg-neutral-secondary-medium w-full border px-4 py-2.5 text-sm focus:outline-none">
              <option value="0">No</option>
              <option value="1">Yes</option>
            </select>
          </div>
          <div class="md:col-span-2">
            <label for="content" class="mb-2 block text-sm font-medium">Content</label>
            <textarea name="content" id="content" rows="4"
              class="border-default bg-neutral-secondary-medium w-full border px-4 py-2.5 text-sm focus:outline-none"
              placeholder="Enter news content" required>{{ old('content') }}</textarea>
          </div>
          <div class="md:col-span-2">
            <label for="image" class="mb-2 block text-sm font-medium">Image</label>
            <input type="file" name="image" id="image" accept="image/*"
              class="border-default bg-neutral-secondary-medium w-full border px-4 text-sm focus:outline-none"
              value="{{ old('image') }}">
          </div>
        </div>
        <div class="mt-6 flex justify-end gap-3">
          <button type="reset" class="border px-6 py-2.5 text-sm font-medium hover:bg-gray-50">
            Cancel
          </button>
          <button type="submit" class="bg-gray-900 px-6 py-2.5 text-sm font-semibold text-gray-50 hover:bg-gray-600">
            Create News
          </button>
        </div>
      </form>
    </div>
  </div>
@elseif($type == 'gallery')
  <div class="my-10">
    <div class="bg-neutral-primary-soft border-default shadow-xs border p-6">
      <p class="mb-6 text-2xl font-bold">Upload New Image</p>
      <x-ui.error />
      <form action="{{ route('admin.gallery.create') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="grid grid-cols-1 gap-6">
          <div>
            <label for="title" class="mb-2 block text-sm font-medium">Image Title</label>
            <input type="text" name="title" id="title"
              class="border-default bg-neutral-secondary-medium w-full border px-4 py-2.5 text-sm focus:outline-none"
              placeholder="Enter image title" required value="{{ old('title') }}">
          </div>
          <div>
            <label for="image" class="mb-2 block text-sm font-medium">Image File</label>
            <input type="file" name="image" id="image" accept="image/*" required
              class="border-default bg-neutral-secondary-medium w-full border px-4 text-sm focus:outline-none">
            <p class="mt-1 text-xs text-gray-500">Accepted formats: JPG, PNG, GIF, SVG (Max: 4MB)</p>
          </div>
        </div>
        <div class="mt-6 flex justify-end gap-3">
          <button type="reset" class="border px-6 py-2.5 text-sm font-medium hover:bg-gray-50">
            Cancel
          </button>
          <button type="submit" class="bg-gray-900 px-6 py-2.5 text-sm font-semibold text-gray-50 hover:bg-gray-600">
            Upload Image
          </button>
        </div>
      </form>
    </div>
  </div>
@elseif($type == 'contact')
  <div class="my-10">
    <div class="bg-neutral-primary-soft border-default shadow-xs border p-6">
      <p class="mb-6 text-2xl font-bold">Contacts</p>
      <x-ui.error />
      <div class="bg-yellow-50 p-4 text-yellow-800">
        <p>Contacts are received from the website's contact form and cannot be created manually.</p>
      </div>
    </div>
  </div>
@endif
