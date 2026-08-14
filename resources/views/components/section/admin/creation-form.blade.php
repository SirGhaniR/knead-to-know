{{-- Modified template from Flowbite --}}

@props(['type'])

@if ($type == 'news')
  <div class="mb-4 w-full" data-aos="fade-up" data-aos-offset="50" data-aos-duration="400">
    <div class="bg-neutral-primary-soft border-default shadow-xs border p-4 sm:p-6 md:p-8" data-aos="zoom-in"
      data-aos-delay="100" data-aos-duration="500">
      <p class="mb-6 text-xl font-bold transition duration-150 sm:text-2xl" data-aos="fade-down" data-aos-delay="80"
        data-aos-duration="300">Buat Berita Baru</p>
      <x-ui.error />
      <form action="{{ route('admin.news.create') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="grid grid-cols-1 gap-4 sm:gap-6 lg:grid-cols-2">
          <div class="lg:col-span-1" data-aos="fade-right" data-aos-delay="120" data-aos-duration="400">
            <label for="title" class="mb-2 block text-sm font-medium">Title</label>
            <input type="text" name="title" id="title"
              class="border-default bg-neutral-secondary-medium w-full border px-3 py-2 text-sm transition duration-150 focus:outline-none sm:px-4 sm:py-2.5"
              placeholder="Enter news title" required value="{{ old('title') }}">
          </div>
          <div class="lg:col-span-1" data-aos="fade-left" data-aos-delay="120" data-aos-duration="400">
            <label for="is_featured" class="mb-2 block text-sm font-medium">Featured</label>
            <select name="is_featured" id="is_featured"
              class="border-default bg-neutral-secondary-medium w-full border px-3 py-2 text-sm transition duration-150 focus:outline-none sm:px-4 sm:py-2.5">
              <option value="0">No</option>
              <option value="1">Yes</option>
            </select>
          </div>
          <div class="lg:col-span-2" data-aos="fade-up" data-aos-delay="150" data-aos-duration="400">
            <label for="content" class="mb-2 block text-sm font-medium">Content</label>
            <textarea name="content" id="content" rows="4"
              class="border-default bg-neutral-secondary-medium w-full border px-3 py-2 text-sm transition duration-150 focus:outline-none sm:px-4 sm:py-2.5"
              placeholder="Enter news content" required>{{ old('content') }}</textarea>
          </div>
          <div class="lg:col-span-2" data-aos="fade-up" data-aos-delay="180" data-aos-duration="400">
            <label for="image" class="mb-2 block text-sm font-medium">Image</label>
            <input type="file" name="image" id="image" accept="image/*"
              class="border-default bg-neutral-secondary-medium w-full border px-3 text-sm transition duration-150 focus:outline-none sm:px-4"
              value="{{ old('image') }}">
          </div>
        </div>
        <div class="mt-6 flex flex-col gap-3 sm:flex-row sm:justify-end" data-aos="fade-up" data-aos-delay="200"
          data-aos-duration="400">
          <button type="reset"
            class="order-2 w-full border px-6 py-2 text-sm font-medium transition duration-150 hover:bg-gray-50 sm:order-1 sm:w-auto">
            Cancel
          </button>
          <button type="submit"
            class="order-1 w-full bg-gray-900 px-6 py-2.5 text-sm font-semibold text-gray-50 transition duration-150 hover:bg-gray-600 sm:order-2 sm:w-auto">
            Create News
          </button>
        </div>
      </form>
    </div>
  </div>
@elseif($type == 'gallery')
  <div class="mb-4 w-full" data-aos="fade-up" data-aos-offset="50" data-aos-duration="400">
    <div class="bg-neutral-primary-soft border-default shadow-xs border p-4 sm:p-6 md:p-8" data-aos="zoom-in"
      data-aos-delay="100" data-aos-duration="500">
      <p class="mb-6 text-xl font-bold transition duration-150 sm:text-2xl" data-aos="fade-down" data-aos-delay="80"
        data-aos-duration="300">Upload Foto Baru</p>
      <x-ui.error />
      <form action="{{ route('admin.gallery.create') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="grid grid-cols-1 gap-4 sm:gap-6 lg:grid-cols-2">
          <div class="lg:col-span-2" data-aos="fade-up" data-aos-delay="120" data-aos-duration="400">
            <label for="title" class="mb-2 block text-sm font-medium">Image Title</label>
            <input type="text" name="title" id="title"
              class="border-default bg-neutral-secondary-medium w-full border px-3 py-2 text-sm transition duration-150 focus:outline-none sm:px-4 sm:py-2.5"
              placeholder="Enter image title" required value="{{ old('title') }}">
          </div>
          <div class="lg:col-span-2" data-aos="fade-up" data-aos-delay="150" data-aos-duration="400">
            <label for="description" class="mb-2 block text-sm font-medium">Description</label>
            <textarea name="description" id="description" rows="4"
              class="border-default bg-neutral-secondary-medium w-full border px-3 py-2 text-sm transition duration-150 focus:outline-none sm:px-4 sm:py-2.5"
              placeholder="Enter image description" required>{{ old('description') }}</textarea>
          </div>
          <div class="lg:col-span-2" data-aos="fade-up" data-aos-delay="180" data-aos-duration="400">
            <label for="image" class="mb-2 block text-sm font-medium">Image File</label>
            <input type="file" name="image" id="image" accept="image/*" required
              class="border-default bg-neutral-secondary-medium w-full border px-3 text-sm transition duration-150 focus:outline-none sm:px-4">
            <p class="mt-1 text-xs text-gray-500">Accepted formats: JPG, PNG, GIF, SVG (Max: 4MB)</p>
          </div>
        </div>
        <div class="mt-6 flex flex-col gap-3 sm:flex-row sm:justify-end" data-aos="fade-up" data-aos-delay="200"
          data-aos-duration="400">
          <button type="reset"
            class="order-2 w-full border px-6 py-2.5 text-sm font-medium transition duration-150 hover:bg-gray-50 sm:order-1 sm:w-auto">
            Cancel
          </button>
          <button type="submit"
            class="order-1 w-full bg-gray-900 px-6 py-2.5 text-sm font-semibold text-gray-50 transition duration-150 hover:bg-gray-600 sm:order-2 sm:w-auto">
            Upload Image
          </button>
        </div>
      </form>
    </div>
  </div>
@elseif($type == 'contact')
  <div class="mb-4 w-full" data-aos="fade-up" data-aos-offset="50" data-aos-duration="400">
    <div class="bg-neutral-primary-soft border-default shadow-xs border p-4 sm:p-6 md:p-8" data-aos="zoom-in"
      data-aos-delay="100" data-aos-duration="500">
      <p class="mb-6 text-xl font-bold transition duration-150 sm:text-2xl" data-aos="fade-down" data-aos-delay="80"
        data-aos-duration="300">Kontak</p>
      <x-ui.error />
      <div class="border border-yellow-200 bg-yellow-50 p-4 text-yellow-800 transition duration-150"
        data-aos="fade-up" data-aos-delay="120" data-aos-duration="400">
        <p>Kontak dibuat melalui form dalam website sehingga tidak bisa dibuat secara manual.</p>
      </div>
    </div>
  </div>
@elseif($type == 'contact-info')
  <div class="mb-4 w-full" data-aos="fade-up" data-aos-offset="50" data-aos-duration="400">
    <div class="bg-neutral-primary-soft border-default shadow-xs border p-4 sm:p-6 md:p-8" data-aos="zoom-in"
      data-aos-delay="100" data-aos-duration="500">
      <p class="mb-6 text-xl font-bold transition duration-150 sm:text-2xl" data-aos="fade-down" data-aos-delay="80"
        data-aos-duration="300">Info Kontak</p>
      <x-ui.error />
      <form action="{{ route('admin.contact-info.create') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="grid grid-cols-1 gap-4 sm:gap-6 lg:grid-cols-2">
          <div class="lg:col-span-1" data-aos="fade-right" data-aos-delay="120" data-aos-duration="400">
            <label for="email" class="mb-2 block text-sm font-medium">Email</label>
            <input type="text" name="email" id="email"
              class="border-default bg-neutral-secondary-medium w-full border px-3 py-2 text-sm transition duration-150 focus:outline-none sm:px-4 sm:py-2.5"
              placeholder="Enter email" required value="{{ old('email') }}">
          </div>
          <div class="lg:col-span-1" data-aos="fade-left" data-aos-delay="120" data-aos-duration="400">
            <label for="phone" class="mb-2 block text-sm font-medium">Phone</label>
            <input type="tel" name="phone" id="phone"
              class="border-default bg-neutral-secondary-medium w-full border px-3 py-2 text-sm transition duration-150 focus:outline-none sm:px-4 sm:py-2.5"
              placeholder="Enter phone" required value="{{ old('phone') }}">
          </div>
          <div class="lg:col-span-2" data-aos="fade-up" data-aos-delay="150" data-aos-duration="400">
            <label for="address" class="mb-2 block text-sm font-medium">Address</label>
            <textarea name="address" id="address" rows="4"
              class="border-default bg-neutral-secondary-medium w-full border px-3 py-2 text-sm transition duration-150 focus:outline-none sm:px-4 sm:py-2.5"
              placeholder="Enter address" required>{{ old('address') }}</textarea>
          </div>
        </div>
        <div class="mt-6 flex flex-col gap-3 sm:flex-row sm:justify-end" data-aos="fade-up" data-aos-delay="200"
          data-aos-duration="400">
          <button type="reset"
            class="order-2 w-full border px-6 py-2.5 text-sm font-medium transition duration-150 hover:bg-gray-50 sm:order-1 sm:w-auto">
            Cancel
          </button>
          <button type="submit"
            class="order-1 w-full bg-gray-900 px-6 py-2.5 text-sm font-semibold text-gray-50 transition duration-150 hover:bg-gray-600 sm:order-2 sm:w-auto">
            Update Info Kontak
          </button>
        </div>
      </form>
    </div>
  </div>
@endif
