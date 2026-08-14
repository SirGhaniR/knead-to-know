{{-- Modified template from flowbite --}}

@props(['type', 'item' => null])

@if ($type == 'news')
  <div class="mt-14 p-4 sm:p-6 lg:ml-auto lg:w-4/5 lg:p-8" data-aos="fade-up" data-aos-offset="50" data-aos-duration="400">
    <div class="w-full">
      <div class="bg-neutral-primary-soft border-default shadow-xs border p-4 sm:p-6 md:p-8" data-aos="zoom-in"
        data-aos-delay="100" data-aos-duration="500">
        <p class="mb-6 text-xl font-bold sm:text-2xl" data-aos="fade-down" data-aos-delay="80" data-aos-duration="300">
          Edit Berita</p>
        <x-ui.error />
        <form action="{{ route('admin.news.update', $item->id) }}" method="POST" enctype="multipart/form-data">
          @csrf
          @method('PUT')
          <div class="grid grid-cols-1 gap-4 sm:gap-6 lg:grid-cols-2">
            <div class="lg:col-span-1" data-aos="fade-right" data-aos-delay="120" data-aos-duration="400">
              <label for="title" class="mb-2 block text-sm font-medium">Title</label>
              <input type="text" name="title" id="title"
                class="border-default bg-neutral-secondary-medium w-full border px-3 py-2 text-sm focus:outline-none sm:px-4 sm:py-2.5"
                placeholder="Enter news title" required value="{{ old('title', $item->title ?? '') }}">
            </div>
            <div class="lg:col-span-1" data-aos="fade-left" data-aos-delay="120" data-aos-duration="400">
              <label for="is_featured" class="mb-2 block text-sm font-medium">Featured</label>
              <select name="is_featured" id="is_featured"
                class="border-default bg-neutral-secondary-medium w-full border px-3 py-2 text-sm focus:outline-none sm:px-4 sm:py-2.5">
                <option value="0" {{ old('is_featured', $item->is_featured ?? 0) == 0 ? 'selected' : '' }}>No
                </option>
                <option value="1" {{ old('is_featured', $item->is_featured ?? 0) == 1 ? 'selected' : '' }}>Yes
                </option>
              </select>
            </div>
            <div class="lg:col-span-2" data-aos="fade-up" data-aos-delay="150" data-aos-duration="400">
              <label for="content" class="mb-2 block text-sm font-medium">Content</label>
              <textarea name="content" id="content" rows="4"
                class="border-default bg-neutral-secondary-medium w-full border px-3 py-2 text-sm focus:outline-none sm:px-4 sm:py-2.5"
                placeholder="Enter news content" required>{{ old('content', $item->content ?? '') }}</textarea>
            </div>
            <div class="lg:col-span-2" data-aos="fade-up" data-aos-delay="180" data-aos-duration="400">
              <label for="image" class="mb-2 block text-sm font-medium">Image</label>
              @if ($item && $item->image)
                <div class="mb-2">
                  <p class="text-sm text-gray-600">Current image:</p>
                  <img src="{{ asset('uploaded_images/' . $item->image) }}" alt="{{ $item->title }}"
                    class="mt-1 h-32 w-32 object-cover outline-1 outline-gray-300 sm:h-40 sm:w-40">
                </div>
              @endif
              <input type="file" name="image" id="image" accept="image/*"
                class="border-default bg-neutral-secondary-medium w-full border px-3 text-sm focus:outline-none sm:px-4">
              <p class="mt-1 text-xs text-gray-500">Leave empty to keep current image</p>
            </div>
          </div>
          <div class="mt-6 flex flex-col gap-3 sm:flex-row sm:justify-end" data-aos="fade-up" data-aos-delay="200"
            data-aos-duration="400">
            <a href="{{ url()->previous() }}"
              class="order-2 w-full border px-6 py-2.5 text-center text-sm font-medium hover:bg-gray-50 sm:order-1 sm:w-auto">
              Cancel
            </a>
            <button type="submit"
              class="order-1 w-full bg-gray-900 px-6 py-2.5 text-sm font-semibold text-gray-50 hover:bg-gray-600 sm:order-2 sm:w-auto">
              Update News
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
@elseif($type == 'gallery')
  <div class="mt-14 p-4 sm:p-6 lg:ml-auto lg:w-4/5 lg:p-8" data-aos="fade-up" data-aos-offset="50"
    data-aos-duration="400">
    <div class="w-full">
      <div class="bg-neutral-primary-soft border-default shadow-xs border p-4 sm:p-6 md:p-8" data-aos="zoom-in"
        data-aos-delay="100" data-aos-duration="500">
        <p class="mb-6 text-xl font-bold sm:text-2xl" data-aos="fade-down" data-aos-delay="80" data-aos-duration="300">
          Edit Foto</p>
        <x-ui.error />
        <form action="{{ route('admin.gallery.update', $item->id) }}" method="POST" enctype="multipart/form-data">
          @csrf
          @method('PUT')
          <div class="grid grid-cols-1 gap-4 sm:gap-6 lg:grid-cols-2">
            <div class="lg:col-span-2" data-aos="fade-up" data-aos-delay="120" data-aos-duration="400">
              <label for="title" class="mb-2 block text-sm font-medium">Image Title</label>
              <input type="text" name="title" id="title"
                class="border-default bg-neutral-secondary-medium w-full border px-3 py-2 text-sm focus:outline-none sm:px-4 sm:py-2.5"
                placeholder="Enter image title" required value="{{ old('title', $item->title ?? '') }}">
            </div>
            <div class="lg:col-span-2" data-aos="fade-up" data-aos-delay="150" data-aos-duration="400">
              <label for="image" class="mb-2 block text-sm font-medium">Image File</label>
              @if ($item && $item->image)
                <div class="mb-2">
                  <p class="text-sm text-gray-600">Current image:</p>
                  <img src="{{ asset('uploaded_images/' . $item->image) }}"
                    alt="{{ $item->title ?? 'Gallery image' }}"
                    class="mt-1 h-32 w-32 object-cover outline-1 outline-gray-300 sm:h-40 sm:w-40">
                </div>
              @endif
              <input type="file" name="image" id="image" accept="image/*"
                class="border-default bg-neutral-secondary-medium w-full border px-3 text-sm focus:outline-none sm:px-4">
              <p class="mt-1 text-xs text-gray-500">Accepted formats: JPG, PNG, GIF, SVG (Max: 4MB). Leave empty to
                keep
                current image</p>
            </div>
          </div>
          <div class="mt-6 flex flex-col gap-3 sm:flex-row sm:justify-end" data-aos="fade-up" data-aos-delay="200"
            data-aos-duration="400">
            <a href="{{ url()->previous() }}"
              class="order-2 w-full border px-6 py-2.5 text-center text-sm font-medium hover:bg-gray-50 sm:order-1 sm:w-auto">
              Cancel
            </a>
            <button type="submit"
              class="order-1 w-full bg-gray-900 px-6 py-2.5 text-sm font-semibold text-gray-50 hover:bg-gray-600 sm:order-2 sm:w-auto">
              Update Image
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
@endif
