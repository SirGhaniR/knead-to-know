<div class="bg-gray-950 px-4 pb-8 pt-12 text-gray-200 sm:px-6 md:px-8 lg:px-36 lg:pb-8 lg:pt-40">
  <div class="lg:gap-30 flex flex-col gap-10 md:gap-12 lg:flex-row">
    <div class="md:flex-2 lg:flex-3 flex flex-1 flex-col gap-6 lg:gap-14">
      <p class="text-xl font-bold">Knead To Know</p>
      <p class="text-sm text-gray-400 sm:text-base">
        Thank you for looking through our website! We hope you had a great experience here. If you encounter ANY problem
        during your visit, feel free to hit me up on the contact page or just email me with the provided mail address on
        your right! Make sure you come here often to read our articles alright? We pay a
        LOT of money to make this website soooo please come to our store :D
      </p>
      <div class="flex gap-2">
        <a href="https://facebook.com/" target="_blank" class="transition-opacity hover:opacity-80">
          <img src="{{ asset('images/icons/001-facebook@2x.png') }}" alt="facebook" class="h-8 w-8 sm:h-10 sm:w-10">
        </a>
        <a href="https://x.com/" target="_blank" class="transition-opacity hover:opacity-80">
          <img src="{{ asset('images/icons/002-twitter@2x.png') }}" alt="twitter" class="h-8 w-8 sm:h-10 sm:w-10">
        </a>
      </div>
    </div>

    <div class="flex flex-1 flex-col gap-4 sm:gap-6">
      <p class="text-base font-semibold sm:text-lg">Useful links</p>
      <a href="#" target="_blank"
        class="text-sm text-gray-400 transition-colors hover:text-gray-200 sm:text-base">Blog</a>
      <a href="#" target="_blank"
        class="text-sm text-gray-400 transition-colors hover:text-gray-200 sm:text-base">Hewan</a>
      <a href="{{ route('gallery.index') }}" target="_blank"
        class="text-sm text-gray-400 transition-colors hover:text-gray-200 sm:text-base">Galeri</a>
      <a href="#" target="_blank"
        class="text-sm text-gray-400 transition-colors hover:text-gray-200 sm:text-base">Testimonial</a>
    </div>

    <div class="flex flex-1 flex-col gap-4 sm:gap-6">
      <p class="text-base font-semibold sm:text-lg">Privacy</p>
      <a href="#" target="_blank"
        class="text-sm text-gray-400 transition-colors hover:text-gray-200 sm:text-base">Karir</a>
      <a href="{{ route('about') }}" target="_blank"
        class="text-sm text-gray-400 transition-colors hover:text-gray-200 sm:text-base">Tentang Kami</a>
      <a href="{{ route('contact.index') }}" target="_blank"
        class="text-sm text-gray-400 transition-colors hover:text-gray-200 sm:text-base">Kontak Kami</a>
      <a href="#" target="_blank"
        class="text-sm text-gray-400 transition-colors hover:text-gray-200 sm:text-base">Servis</a>
    </div>

    <div class="lg:flex-2 flex flex-1 flex-col gap-4 sm:gap-6">
      <p class="text-base font-semibold sm:text-lg">
        Contact Info
      </p>
      <a href="mailto:{{ Str::remove(' ', $contactInfo->email) }}"
        class="align-center flex items-center gap-3 text-sm text-gray-400 transition-colors hover:text-gray-200 sm:gap-4 sm:text-base"
        target="_blank">
        <img src="{{ asset('images/icons/mail.png') }}" alt="mail-icon" class="h-3 w-3 sm:h-4 sm:w-4">
        {{ $contactInfo->email }}
      </a>
      <a href="tel:{{ Str::remove(' ', $contactInfo->phone) }}"
        class="align-center flex items-center gap-3 text-sm text-gray-400 transition-colors hover:text-gray-200 sm:gap-4 sm:text-base"
        target="_blank">
        <img src="{{ asset('images/icons/phone.png') }}" alt="phone-icon" class="h-3 w-3 sm:h-4 sm:w-4">
        {{ $contactInfo->phone }}
      </a>
      <a href="{{ 'https://www.google.com/maps/search/' . $contactInfo->address }}"
        class="align-center flex items-center gap-3 text-sm text-gray-400 transition-colors hover:text-gray-200 sm:gap-4 sm:text-base"
        target="_blank">
        <img src="{{ asset('images/icons/location.png') }}" alt="location-icon"
          class="aspect-square h-3 w-3 object-contain sm:h-4 sm:w-4">
        <span class="flex-1">{{ $contactInfo->address }}</span>
      </a>
    </div>
  </div>

  <p class="mt-12 text-center text-sm sm:mt-16 lg:mt-20 lg:text-base">Copyright ©2026 All right reserved</p>
</div>
