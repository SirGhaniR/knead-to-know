<div class="bg-gray-950 px-4 pb-8 pt-12 text-gray-200 sm:px-6 md:px-8 lg:px-36 lg:pb-8 lg:pt-40">
  <div class="lg:gap-30 flex flex-col gap-10 md:gap-12 lg:flex-row">
    <div class="md:flex-2 lg:flex-3 flex flex-1 flex-col gap-6 lg:gap-14">
      <p class="text-xl font-bold transition">Knead To
        Know</p>
      <p class="text-sm text-gray-400">
        Thank you for looking through our website! We hope you had a great experience here. If you encounter ANY
        problem
        during your visit, feel free to hit me up on the contact page or just email me with the provided mail
        address on
        your right! Make sure you come here often to read our articles alright? We pay a
        LOT of money to make this website soooo please come to our store :D
      </p>
      <div class="flex gap-2">
        <a class="transition duration-150 -110 hover:opacity-80" href="https://facebook.com/" target="_blank">
          <img class="h-8 w-8 sm:h-10 sm:w-10" src="{{ asset('images/icons/001-facebook@2x.png') }}" alt="facebook">
        </a>
        <a class="transition duration-150 -110 hover:opacity-80" href="https://x.com/" target="_blank">
          <img class="h-8 w-8 sm:h-10 sm:w-10" src="{{ asset('images/icons/002-twitter@2x.png') }}" alt="twitter">
        </a>
      </div>
    </div>

    <div class="flex flex-1 flex-col gap-4 sm:gap-6">
      <p class="text-base font-semibold transition sm:text-lg">Useful links</p>
      <a class="text-sm text-gray-400 transition duration-150 hover:text-gray-200" href="#"
        target="_blank">Blog</a>
      <a class="text-sm text-gray-400 transition duration-150 hover:text-gray-200" href="#"
        target="_blank">Hewan</a>
      <a class="text-sm text-gray-400 transition duration-150 hover:text-gray-200" href="{{ route('gallery.index') }}"
        target="_blank">Galeri</a>
      <a class="text-sm text-gray-400 transition duration-150 hover:text-gray-200" href="#"
        target="_blank">Testimonial</a>
    </div>

    <div class="flex flex-1 flex-col gap-4 sm:gap-6">
      <p class="text-base font-semibold transition sm:text-lg">Privacy</p>
      <a class="text-sm text-gray-400 transition duration-150 hover:text-gray-200" href="#"
        target="_blank">Karir</a>
      <a class="text-sm text-gray-400 transition duration-150 hover:text-gray-200" href="{{ route('about') }}"
        target="_blank">Tentang Kami</a>
      <a class="text-sm text-gray-400 transition duration-150 hover:text-gray-200" href="{{ route('contact.index') }}"
        target="_blank">Kontak Kami</a>
      <a class="text-sm text-gray-400 transition duration-150 hover:text-gray-200" href="#"
        target="_blank">Servis</a>
    </div>

    <div class="lg:flex-2 flex flex-1 flex-col gap-4 sm:gap-6">
      <p class="text-base font-semibold transition sm:text-lg">
        Contact Info
      </p>
      <a class="align-center flex items-center gap-3 text-sm text-gray-400 transition duration-150 hover:text-gray-200 sm:gap-4"
        href="{{ $contactInfo?->email ? 'mailto:' . Str::remove(' ', $contactInfo->email) : '#' }}" target="_blank">
        <img class="h-3 w-3 sm:h-4 sm:w-4" src="{{ asset('images/icons/mail.png') }}" alt="mail-icon">
        {{ $contactInfo?->email ?? '-' }}
      </a>
      <a class="align-center flex items-center gap-3 text-sm text-gray-400 transition duration-150 hover:text-gray-200 sm:gap-4"
        href="{{ $contactInfo?->phone ? 'tel:' . Str::remove(' ', $contactInfo->phone) : '#' }}" target="_blank">
        <img class="h-3 w-3 sm:h-4 sm:w-4" src="{{ asset('images/icons/phone.png') }}" alt="phone-icon">
        {{ $contactInfo?->phone ?? '-' }}
      </a>
      <a class="align-center flex items-center gap-3 text-sm text-gray-400 transition duration-150 hover:text-gray-200 sm:gap-4"
        href="{{ $contactInfo?->address ? 'https://www.google.com/maps/search/' . $contactInfo->address : '#' }}"
        target="_blank">
        <img class="aspect-square h-3 w-3 object-contain sm:h-4 sm:w-4" src="{{ asset('images/icons/location.png') }}"
          alt="location-icon">
        <span class="flex-1">{{ $contactInfo?->address ?? '-' }}</span>
      </a>
    </div>
  </div>

  <p class="mt-12 text-center text-sm sm:mt-16 lg:mt-20 lg:text-base">Copyright ©2026 All right reserved</p>
</div>
