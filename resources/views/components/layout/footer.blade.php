<div class="bg-gray-950 px-4 pb-8 pt-12 text-gray-200 sm:px-6 md:px-8 lg:px-36 lg:pb-8 lg:pt-40" data-aos="fade-up"
  data-aos-offset="50" data-aos-duration="400">
  <div class="lg:gap-30 flex flex-col gap-10 md:gap-12 lg:flex-row">
    <div class="md:flex-2 lg:flex-3 flex flex-1 flex-col gap-6 lg:gap-14" data-aos="fade-right" data-aos-delay="100"
      data-aos-duration="400">
      <p class="text-xl font-bold transition duration-150 hover:scale-105" data-aos="fade-down" data-aos-delay="80"
        data-aos-duration="300">Knead To Know</p>
      <p class="text-sm text-gray-400" data-aos="fade-up" data-aos-delay="120" data-aos-duration="400">
        Thank you for looking through our website! We hope you had a great experience here. If you encounter ANY problem
        during your visit, feel free to hit me up on the contact page or just email me with the provided mail address on
        your right! Make sure you come here often to read our articles alright? We pay a
        LOT of money to make this website soooo please come to our store :D
      </p>
      <div class="flex gap-2" data-aos="fade-up" data-aos-delay="150" data-aos-duration="400">
        <a href="https://facebook.com/" target="_blank"
          class="transition duration-150 hover:scale-110 hover:opacity-80">
          <img src="{{ asset('images/icons/001-facebook@2x.png') }}" alt="facebook" class="h-8 w-8 sm:h-10 sm:w-10">
        </a>
        <a href="https://x.com/" target="_blank" class="transition duration-150 hover:scale-110 hover:opacity-80">
          <img src="{{ asset('images/icons/002-twitter@2x.png') }}" alt="twitter" class="h-8 w-8 sm:h-10 sm:w-10">
        </a>
      </div>
    </div>

    <div class="flex flex-1 flex-col gap-4 sm:gap-6" data-aos="fade-up" data-aos-delay="150" data-aos-duration="400">
      <p class="text-base font-semibold transition duration-150 hover:scale-105 sm:text-lg" data-aos="fade-down"
        data-aos-delay="80" data-aos-duration="300">Useful links</p>
      <a href="#" target="_blank"
        class="text-sm text-gray-400 transition duration-150 hover:translate-x-1 hover:text-gray-200"
        data-aos="fade-left" data-aos-delay="100" data-aos-duration="300">Blog</a>
      <a href="#" target="_blank"
        class="text-sm text-gray-400 transition duration-150 hover:translate-x-1 hover:text-gray-200"
        data-aos="fade-left" data-aos-delay="130" data-aos-duration="300">Hewan</a>
      <a href="{{ route('gallery.index') }}" target="_blank"
        class="text-sm text-gray-400 transition duration-150 hover:translate-x-1 hover:text-gray-200"
        data-aos="fade-left" data-aos-delay="160" data-aos-duration="300">Galeri</a>
      <a href="#" target="_blank"
        class="text-sm text-gray-400 transition duration-150 hover:translate-x-1 hover:text-gray-200"
        data-aos="fade-left" data-aos-delay="190" data-aos-duration="300">Testimonial</a>
    </div>

    <div class="flex flex-1 flex-col gap-4 sm:gap-6" data-aos="fade-up" data-aos-delay="200" data-aos-duration="400">
      <p class="text-base font-semibold transition duration-150 hover:scale-105 sm:text-lg" data-aos="fade-down"
        data-aos-delay="80" data-aos-duration="300">Privacy</p>
      <a href="#" target="_blank"
        class="text-sm text-gray-400 transition duration-150 hover:translate-x-1 hover:text-gray-200"
        data-aos="fade-left" data-aos-delay="100" data-aos-duration="300">Karir</a>
      <a href="{{ route('about') }}" target="_blank"
        class="text-sm text-gray-400 transition duration-150 hover:translate-x-1 hover:text-gray-200"
        data-aos="fade-left" data-aos-delay="130" data-aos-duration="300">Tentang Kami</a>
      <a href="{{ route('contact.index') }}" target="_blank"
        class="text-sm text-gray-400 transition duration-150 hover:translate-x-1 hover:text-gray-200"
        data-aos="fade-left" data-aos-delay="160" data-aos-duration="300">Kontak Kami</a>
      <a href="#" target="_blank"
        class="text-sm text-gray-400 transition duration-150 hover:translate-x-1 hover:text-gray-200"
        data-aos="fade-left" data-aos-delay="190" data-aos-duration="300">Servis</a>
    </div>

    <div class="lg:flex-2 flex flex-1 flex-col gap-4 sm:gap-6" data-aos="fade-left" data-aos-delay="150"
      data-aos-duration="400">
      <p class="text-base font-semibold transition duration-150 hover:scale-105 sm:text-lg" data-aos="fade-down"
        data-aos-delay="80" data-aos-duration="300">
        Contact Info
      </p>
      <a href="mailto:{{ Str::remove(' ', $contactInfo->email) }}"
        class="align-center flex items-center gap-3 text-sm text-gray-400 transition duration-150 hover:translate-x-1 hover:text-gray-200 sm:gap-4"
        target="_blank" data-aos="fade-right" data-aos-delay="100" data-aos-duration="300">
        <img src="{{ asset('images/icons/mail.png') }}" alt="mail-icon" class="h-3 w-3 sm:h-4 sm:w-4">
        {{ $contactInfo->email }}
      </a>
      <a href="tel:{{ Str::remove(' ', $contactInfo->phone) }}"
        class="align-center flex items-center gap-3 text-sm text-gray-400 transition duration-150 hover:translate-x-1 hover:text-gray-200 sm:gap-4"
        target="_blank" data-aos="fade-right" data-aos-delay="130" data-aos-duration="300">
        <img src="{{ asset('images/icons/phone.png') }}" alt="phone-icon" class="h-3 w-3 sm:h-4 sm:w-4">
        {{ $contactInfo->phone }}
      </a>
      <a href="{{ 'https://www.google.com/maps/search/' . $contactInfo->address }}"
        class="align-center flex items-center gap-3 text-sm text-gray-400 transition duration-150 hover:translate-x-1 hover:text-gray-200 sm:gap-4"
        target="_blank" data-aos="fade-right" data-aos-delay="160" data-aos-duration="300">
        <img src="{{ asset('images/icons/location.png') }}" alt="location-icon"
          class="aspect-square h-3 w-3 object-contain sm:h-4 sm:w-4">
        <span class="flex-1">{{ $contactInfo->address }}</span>
      </a>
    </div>
  </div>

  <p class="mt-12 text-center text-sm transition duration-150 hover:scale-105 sm:mt-16 lg:mt-20 lg:text-base"
    data-aos="fade-up" data-aos-delay="200" data-aos-duration="400">Copyright ©2026 All right reserved</p>
</div>
