{{-- Modified template from flowbite --}}

@props(['type', 'item' => null])

@if ($type == 'news')
  <div class="mt-14 p-4 sm:p-6 lg:ml-auto lg:w-4/5 lg:p-8" data-aos="fade-up" data-aos-offset="50" data-aos-duration="400">
    <div class="w-full">
      <div class="bg-neutral-primary-soft border-gray-300 shadow-xs border p-4 sm:p-6 md:p-8" data-aos="zoom-in"
        data-aos-delay="100" data-aos-duration="500">
        <p class="mb-6 text-xl font-bold sm:text-2xl" data-aos="fade-down" data-aos-delay="80" data-aos-duration="300">
          Edit Berita</p>
        <x-ui.error />
        <form action="{{ route('admin.news.update', $item->id) }}" method="POST" enctype="multipart/form-data">
          @csrf
          @method('PUT')
          <div class="grid grid-cols-1 gap-4 sm:gap-6 lg:grid-cols-2">
            <div class="lg:col-span-1" data-aos="fade-right" data-aos-delay="120" data-aos-duration="400">
              <label class="mb-2 block text-sm font-medium" for="title">Title</label>
              <input
                class="border-gray-300 bg-neutral-secondary-medium w-full border px-3 py-2 text-sm focus:outline-none sm:px-4 sm:py-2.5"
                id="title" name="title" type="text" value="{{ old('title', $item->title ?? '') }}"
                placeholder="Enter news title" required>
            </div>
            <div class="lg:col-span-1" data-aos="fade-left" data-aos-delay="120" data-aos-duration="400">
              <label class="mb-2 block text-sm font-medium" for="is_featured">Featured</label>
              <select
                class="border-gray-300 bg-neutral-secondary-medium w-full border px-3 py-2 text-sm focus:outline-none sm:px-4 sm:py-2.5"
                id="is_featured" name="is_featured">
                <option value="0" {{ old('is_featured', $item->is_featured ?? 0) == 0 ? 'selected' : '' }}>No
                </option>
                <option value="1" {{ old('is_featured', $item->is_featured ?? 0) == 1 ? 'selected' : '' }}>Yes
                </option>
              </select>
            </div>
            <div class="lg:col-span-2" data-aos="fade-up" data-aos-delay="150" data-aos-duration="400">
              <label class="mb-2 block text-sm font-medium" for="content">Content</label>
              <textarea
                class="border-gray-300 bg-neutral-secondary-medium w-full border px-3 py-2 text-sm focus:outline-none sm:px-4 sm:py-2.5"
                id="content" name="content" rows="12" placeholder="Enter news content" required>{{ old('content', $item->content ?? '') }}</textarea>
            </div>
            <div class="lg:col-span-2" data-aos="fade-up" data-aos-delay="180" data-aos-duration="400">
              <label class="mb-2 block text-sm font-medium" for="image">Image</label>
              @if ($item && $item->image)
                <div class="mb-2">
                  <p class="text-sm text-gray-600">Current image:</p>
                  <img class="mt-1 h-32 w-32 object-cover outline-1 outline-gray-300 sm:h-40 sm:w-40"
                    src="{{ asset('uploaded_images/' . $item->image) }}" alt="{{ $item->title }}">
                </div>
              @endif
              <input
                class="border-gray-300 bg-neutral-secondary-medium w-full border px-3 text-sm focus:outline-none sm:px-4"
                id="image" name="image" type="file" accept="image/*">
              <p class="mt-1 text-xs text-gray-500">Leave empty to keep current image</p>
            </div>
          </div>
          <div class="mt-6 flex flex-col gap-3 sm:flex-row sm:justify-end" data-aos="fade-up" data-aos-delay="200"
            data-aos-duration="400">
            <a class="order-2 w-full border px-6 py-2.5 text-center text-sm font-medium hover:bg-gray-50 sm:order-1 sm:w-auto"
              href="{{ url()->previous() }}">
              Cancel
            </a>
            <button
              class="order-1 w-full bg-gray-900 px-6 py-2.5 text-sm font-semibold text-gray-50 hover:bg-gray-600 sm:order-2 sm:w-auto"
              type="submit">
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
      <div class="bg-neutral-primary-soft border-gray-300 shadow-xs border p-4 sm:p-6 md:p-8" data-aos="zoom-in"
        data-aos-delay="100" data-aos-duration="500">
        <p class="mb-6 text-xl font-bold sm:text-2xl" data-aos="fade-down" data-aos-delay="80" data-aos-duration="300">
          Edit Foto</p>
        <x-ui.error />
        <form action="{{ route('admin.gallery.update', $item->id) }}" method="POST" enctype="multipart/form-data">
          @csrf
          @method('PUT')
          <div class="grid grid-cols-1 gap-4 sm:gap-6 lg:grid-cols-2">
            <div class="lg:col-span-2" data-aos="fade-up" data-aos-delay="120" data-aos-duration="400">
              <label class="mb-2 block text-sm font-medium" for="title">Image Title</label>
              <input
                class="border-gray-300 bg-neutral-secondary-medium w-full border px-3 py-2 text-sm focus:outline-none sm:px-4 sm:py-2.5"
                id="title" name="title" type="text" value="{{ old('title', $item->title ?? '') }}"
                placeholder="Enter image title" required>
            </div>
            <div class="lg:col-span-2" data-aos="fade-up" data-aos-delay="150" data-aos-duration="400">
              <label class="mb-2 block text-sm font-medium" for="image">Image File</label>
              @if ($item && $item->image)
                <div class="mb-2">
                  <p class="text-sm text-gray-600">Current image:</p>
                  <img class="mt-1 h-32 w-32 object-cover outline-1 outline-gray-300 sm:h-40 sm:w-40"
                    src="{{ asset('uploaded_images/' . $item->image) }}"
                    alt="{{ $item->title ?? 'Gallery image' }}">
                </div>
              @endif
              <input
                class="border-gray-300 bg-neutral-secondary-medium w-full border px-3 text-sm focus:outline-none sm:px-4"
                id="image" name="image" type="file" accept="image/*">
              <p class="mt-1 text-xs text-gray-500">Accepted formats: JPG, PNG, GIF, SVG (Max: 1MB).
                Leave empty to
                keep
                current image</p>
            </div>
          </div>
          <div class="mt-6 flex flex-col gap-3 sm:flex-row sm:justify-end" data-aos="fade-up" data-aos-delay="200"
            data-aos-duration="400">
            <a class="order-2 w-full border px-6 py-2.5 text-center text-sm font-medium hover:bg-gray-50 sm:order-1 sm:w-auto"
              href="{{ url()->previous() }}">
              Cancel
            </a>
            <button
              class="order-1 w-full bg-gray-900 px-6 py-2.5 text-sm font-semibold text-gray-50 hover:bg-gray-600 sm:order-2 sm:w-auto"
              type="submit">
              Update Image
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
@elseif($type == 'contact')
  <div class="mt-14 p-4 sm:p-6 lg:ml-auto lg:w-4/5 lg:p-8" data-aos="fade-up" data-aos-offset="50"
    data-aos-duration="400">
    <div class="w-full">
      <div class="bg-neutral-primary-soft border-gray-300 shadow-xs border p-4 sm:p-6 md:p-8" data-aos="zoom-in"
        data-aos-delay="100" data-aos-duration="500">
        <p class="mb-6 text-xl font-bold sm:text-2xl" data-aos="fade-down" data-aos-delay="80"
          data-aos-duration="300">
          Balas Pesan</p>
        <x-ui.error />

        <div class="mb-6 rounded border border-gray-200 bg-gray-50 p-4 text-sm" data-aos="fade-up"
          data-aos-delay="100" data-aos-duration="400">
          <p><span class="font-medium">Dari:</span> {{ $item->name ?? 'Pengunjung' }} ({{ $item->email }})
          </p>
          <p class="mt-1"><span class="font-medium">Subjek:</span>
            {{ $item->subject ?? 'Pesan dari website' }}</p>
          <p class="mt-1"><span class="font-medium">Pesan:</span></p>
          <p class="mt-1 whitespace-pre-wrap text-gray-700">{{ $item->message ?? '-' }}</p>
        </div>

        <form onsubmit="return openGmailReply(event, '{{ $item->email }}', this)">
          <div class="grid grid-cols-1 gap-4 sm:gap-6">
            <div data-aos="fade-up" data-aos-delay="120" data-aos-duration="400">
              <label class="mb-2 block text-sm font-medium" for="reply_subject">Subject</label>
              <input
                class="border-gray-300 bg-neutral-secondary-medium w-full border px-3 py-2 text-sm focus:outline-none sm:px-4 sm:py-2.5"
                id="reply_subject" name="reply_subject" type="text"
                value="Re: {{ $item->subject ?? 'Pesan dari website' }}" required>
            </div>
            <div data-aos="fade-up" data-aos-delay="150" data-aos-duration="400">
              <label class="mb-2 block text-sm font-medium" for="reply_body">Body</label>
              <textarea
                class="border-gray-300 bg-neutral-secondary-medium w-full border px-3 py-2 text-sm focus:outline-none sm:px-4 sm:py-2.5"
                id="reply_body" name="reply_body" rows="24" required placeholder="Tulis balasan Anda di sini...">{{ "\n\n\n--- Pesan Asli ---\nDari: " . ($item->name ?? 'Pengunjung') . ' (' . $item->email . ")\n\n" . ($item->message ?? '') }}</textarea>
            </div>
          </div>
          <div class="mt-6 flex flex-col gap-3 sm:flex-row sm:justify-end" data-aos="fade-up" data-aos-delay="200"
            data-aos-duration="400">
            <a class="order-2 w-full border px-6 py-2.5 text-center text-sm font-medium hover:bg-gray-50 sm:order-1 sm:w-auto"
              href="{{ url()->previous() }}">
              Cancel
            </a>
            <button
              class="order-1 w-full bg-gray-900 px-6 py-2.5 text-sm cursor-pointer font-semibold text-gray-50 hover:bg-gray-600 sm:order-2 sm:w-auto"
              type="submit">
              Buka di Gmail
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
@endif
