{{-- Modified template from Flowbite --}}

@props([
    'news' => [],
    'galleries' => [],
    'contacts' => [],
    'contactInfo' => [],
])

@if ($news)
    <div class="p-4 sm:p-6 lg:ml-auto lg:w-4/5 lg:p-8" data-aos="fade-up" data-aos-offset="50" data-aos-duration="400">
        <div class="w-full">
            <p class="mb-4 text-2xl font-bold transition duration-150 sm:text-3xl lg:text-4xl" data-aos="fade-down"
                data-aos-delay="80" data-aos-duration="300">Berita - Management</p>
            {{ $slot }}
            <div class="mt-6 flex flex-col gap-3">
                @forelse ($news as $index => $newsItem)
                    <div class="cursor-pointer border border-gray-300 bg-white transition duration-150 hover:bg-gray-50"
                        data-modal-target="modal-{{ $newsItem->id }}" data-modal-toggle="modal-{{ $newsItem->id }}"
                        data-aos="fade-up" data-aos-delay="{{ 80 + ($index + 1) * 50 }}" data-aos-duration="300">
                        <div class="flex h-32 md:h-42">
                            @if ($newsItem->image)
                                <img src="{{ asset('uploaded_images/' . $newsItem->image) }}"
                                    alt="{{ $newsItem->title }}" class="h-full aspect-square shrink-0 object-cover">
                            @else
                                <div
                                    class="flex h-full aspect-square shrink-0 items-center justify-center bg-gray-100 text-gray-500">
                                    <i class="fa-solid fa-image text-3xl"></i>
                                </div>
                            @endif
                            <div class="flex flex-col justify-between gap-2 p-3">
                                <div class="flex items-start gap-2">
                                    <p class="line-clamp-2 flex-1 text-sm font-semibold">{{ $newsItem->title }}</p>
                                    @if ($newsItem->is_featured)
                                        <span
                                            class="shrink-0 bg-yellow-100 px-2 py-0.5 text-sm font-semibold text-yellow-800">Featured</span>
                                    @endif
                                </div>
                                <p class="line-clamp-2 md:line-clamp-3 lg:line-clamp-3 text-sm text-gray-600">
                                    {{ $newsItem->content }}</p>
                                <div class="flex items-center gap-3">
                                    <span
                                        class="text-sm text-gray-500">{{ $newsItem->created_at->diffForHumans() }}</span>
                                    <div class="ml-auto flex items-center gap-3">
                                        <a href="{{ route('admin.news.edit', $newsItem->id) }}"
                                            onclick="event.stopPropagation()"
                                            class="text-yellow-600 transition duration-150 hover:text-yellow-700"
                                            title="Edit">
                                            <i class="fa-regular fa-pen-to-square text-lg"></i>
                                        </a>
                                        <form action="{{ route('admin.news.delete', $newsItem->id) }}" method="POST"
                                            class="inline" onclick="event.stopPropagation()"
                                            onsubmit="return confirm('Are you sure you want to delete this news?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="cursor-pointer text-red-400 transition duration-150 hover:text-red-500"
                                                title="Hapus">
                                                <i class="fa-regular fa-trash-can text-lg"></i>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <x-ui.modal id="{{ $newsItem->id }}" title="Detail Berita" :item="$newsItem" type="news"
                        editRoute="admin.news.edit" />
                @empty
                    <div class="py-10 text-center text-gray-500">Belum ada berita</div>
                @endforelse
            </div>

            <div class="mt-4">
                {{ $news->links() }}
            </div>
        </div>
    </div>
@elseif($galleries)
    <div class="p-4 sm:p-6 lg:ml-auto lg:w-4/5 lg:p-8" data-aos="fade-up" data-aos-offset="50" data-aos-duration="400">
        <div class="w-full">
            <p class="mb-6 text-2xl font-bold transition duration-150 sm:text-3xl lg:text-4xl" data-aos="fade-down"
                data-aos-delay="80" data-aos-duration="300">Galeri - Management</p>
            {{ $slot }}
            <div class="mb-8 grid grid-cols-2 gap-3 sm:grid-cols-2 sm:gap-3 md:grid-cols-4">
                @forelse ($galleries as $index => $gallery)
                    <div class="cursor-pointer border border-gray-300 bg-white transition duration-150"
                        data-modal-target="modal-{{ $gallery->id }}" data-modal-toggle="modal-{{ $gallery->id }}"
                        data-aos="zoom-in" data-aos-delay="{{ 80 + ($index + 1) * 50 }}" data-aos-duration="400">
                        <div class="relative aspect-square overflow-hidden bg-gray-100">
                            @if ($gallery->image)
                                <img src="{{ asset('uploaded_images/' . $gallery->image) }}"
                                    alt="{{ $gallery->title ?? 'Gallery image' }}" class="h-full w-full object-cover">
                            @else
                                <div class="flex h-full items-center justify-center text-sm text-gray-500">No Image
                                </div>
                            @endif
                            <div class="absolute top-1.5 right-1.5 flex items-center gap-1">
                                <a href="{{ route('admin.gallery.edit', $gallery->id) }}"
                                    onclick="event.stopPropagation()"
                                    class="bg-white p-1.5 text-yellow-600 transition duration-150 hover:text-yellow-700"
                                    title="Edit">
                                    <i class="fa-regular fa-pen-to-square text-base"></i>
                                </a>
                                <form action="{{ route('admin.gallery.delete', $gallery->id) }}" method="POST"
                                    class="inline" onclick="event.stopPropagation()"
                                    onsubmit="return confirm('Are you sure you want to delete this image?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="cursor-pointer bg-white p-1.5 text-red-400 transition duration-150 hover:text-red-500"
                                        title="Hapus">
                                        <i class="fa-regular fa-trash-can text-base"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                        <div class="flex flex-col gap-2 md:gap-3 p-3">
                            <h3 class="text-sm font-semibold text-gray-900">
                                {{ $gallery->title ?: 'Untitled' }}</h3>
                            @if ($gallery->description)
                                <p class="line-clamp-1 md:line-clamp-2 text-sm text-gray-600">
                                    {{ $gallery->description }}</p>
                            @endif
                            <hr class="border-gray-200 border">
                            <span class="text-sm text-gray-500">{{ $gallery->created_at->format('d M Y') }}</span>
                        </div>
                    </div>

                    <x-ui.modal id="{{ $gallery->id }}" title="Detail Foto" :item="$gallery" type="gallery"
                        editRoute="admin.gallery.edit" />
                @empty
                    <div class="col-span-full py-10 text-center text-gray-500">Belum ada foto</div>
                @endforelse
            </div>

            {{ $galleries->links() }}
        </div>
    </div>
@elseif($contacts)
    <div class="p-4 sm:p-6 lg:ml-auto lg:w-4/5 lg:p-8 mb-8" data-aos="fade-up" data-aos-offset="50"
        data-aos-duration="400">
        <div class="w-full">
            <p class="mb-4 text-2xl font-bold transition duration-150 sm:text-3xl lg:text-4xl" data-aos="fade-down"
                data-aos-delay="80" data-aos-duration="300">Kontak - Management</p>
            {{ $slot }}

            <div class="flex flex-col gap-3">
                @forelse ($contacts as $index => $contact)
                    <div class="cursor-pointer border bg-white p-3 transition duration-150 {{ $contact->is_read ? 'border-gray-300' : 'border-yellow-600' }}"
                        data-modal-target="modal-{{ $contact->id }}" data-modal-toggle="modal-{{ $contact->id }}"
                        data-aos="fade-up" data-aos-delay="{{ 80 + ($index + 1) * 50 }}" data-aos-duration="300">
                        <div class="flex flex-col gap-1.5">
                            <div class="flex items-start gap-2">
                                <p class="truncate flex-1 text-sm font-semibold">{{ $contact->name }}</p>
                                @if (!$contact->is_read)
                                    <span
                                        class="shrink-0 bg-yellow-100 px-2 py-0.5 text-sm font-semibold text-yellow-800">Baru</span>
                                @endif
                            </div>
                            <p class="truncate text-sm text-gray-600">{{ $contact->email }}</p>
                            <p class="truncate text-sm font-medium">
                                {{ $contact->subject ?: '(tanpa subjek)' }}</p>
                            <p class="line-clamp-2 text-sm text-gray-600">{{ $contact->message }}</p>
                            <div class="flex items-center gap-3">
                                <span class="text-sm text-gray-500">{{ $contact->created_at->diffForHumans() }}</span>
                                <div class="ml-auto flex items-center gap-3">
                                    <a href="{{ route('admin.contact.reply', $contact->id) }}"
                                        onclick="event.stopPropagation()"
                                        class="text-blue-500 transition duration-150 hover:text-blue-600"
                                        title="Reply">
                                        <i class="fa-solid fa-reply text-lg"></i>
                                    </a>
                                    @if (!$contact->is_read)
                                        <form action="{{ route('admin.contact.update', $contact->id) }}"
                                            method="POST" class="inline" onclick="event.stopPropagation()">
                                            @csrf
                                            @method('PUT')
                                            <input type="hidden" name="is_read" value="1">
                                            <button type="submit"
                                                class="cursor-pointer text-green-500 transition duration-150 hover:text-green-600"
                                                title="Mark as Read">
                                                <i class="fa-solid fa-envelope-open-text text-lg"></i>
                                            </button>
                                        </form>
                                    @endif
                                    <form action="{{ route('admin.contact.delete', $contact->id) }}" method="POST"
                                        class="inline" onclick="event.stopPropagation()"
                                        onsubmit="return confirm('Are you sure you want to delete this contact message?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="cursor-pointer text-red-400 transition duration-150 hover:text-red-500"
                                            title="Hapus">
                                            <i class="fa-regular fa-trash-can text-lg"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <x-ui.modal id="{{ $contact->id }}" title="Detail Pesan" :item="$contact" type="contact"
                        showStatus="true" statusField="is_read" statusLabels="['Read', 'Unread']"
                        statusColors="['bg-green-100 text-green-800', 'bg-yellow-100 text-yellow-800']" />
                @empty
                    <div class="py-10 text-center text-gray-500">Belum ada pesan</div>
                @endforelse
            </div>

            <div class="mt-4">
                {{ $contacts->links() }}
            </div>
        </div>
    </div>
@elseif($contactInfo)
    <div class="p-4 sm:p-6 lg:ml-auto lg:w-4/5 lg:p-8 mb-8" data-aos="fade-up" data-aos-offset="50"
        data-aos-duration="400">
        <div class="w-full">
            <p class="mb-4 text-2xl font-bold transition duration-150 sm:text-3xl lg:text-4xl" data-aos="fade-down"
                data-aos-delay="80" data-aos-duration="300">Info Kontak - Management</p>
            {{ $slot }}
            <div class="flex flex-col gap-3">
                <div class="cursor-pointer border border-gray-300 bg-white p-4 transition duration-150 hover:bg-gray-50"
                    data-modal-target="modal-{{ $contactInfo->id }}"
                    data-modal-toggle="modal-{{ $contactInfo->id }}" data-aos="fade-up" data-aos-delay="100"
                    data-aos-duration="300">
                    <div class="flex flex-col gap-4 md:gap-6">
                        <div class="flex items-start gap-3 sm:flex-1">
                            <div class="flex h-10 w-10 shrink-0 items-center justify-center text-gray-500">
                                <i class="fa-solid fa-envelope text-lg"></i>
                            </div>
                            <div class="min-w-0">
                                <p class=" ">Email</p>
                                <p class="break-all text-sm font-semibold">{{ $contactInfo->email }}</p>
                            </div>
                        </div>
                        <div class="flex items-start gap-3 sm:flex-1">
                            <div class="flex h-10 w-10 shrink-0 items-center justify-center text-gray-500">
                                <i class="fa-solid fa-phone text-lg"></i>
                            </div>
                            <div class="min-w-0">
                                <p class=" ">Phone</p>
                                <p class="break-all text-sm font-semibold">{{ $contactInfo->phone }}</p>
                            </div>
                        </div>
                        <div class="flex items-start gap-3 sm:flex-1">
                            <div class="flex h-10 w-10 shrink-0 items-center justify-center text-gray-500">
                                <i class="fa-solid fa-location-dot text-lg"></i>
                            </div>
                            <div class="min-w-0">
                                <p class=" ">Address</p>
                                <p class="line-clamp-2 break-all text-sm font-semibold">
                                    {{ $contactInfo->address }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <x-ui.modal id="{{ $contactInfo->id }}" title="Detail Alamat" :item="$contactInfo"
                    type="contact-info" />
            </div>
        </div>
    </div>
@else
    <div class="p-4 sm:p-6 lg:ml-auto lg:w-4/5 lg:p-8" data-aos="fade-up" data-aos-duration="400">
        <div class="w-full">
            <p class="text-3xl font-extrabold uppercase sm:text-4xl lg:text-5xl">500 Internal Server Error</p>
        </div>
    </div>
@endif
