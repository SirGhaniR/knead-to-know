<div class="bg-gray-950 px-36 pb-8 pt-40 text-gray-200">
  <div class="gap-30 flex">
    <div class="flex-3 flex flex-col gap-14">
      <p class="text-xl font-bold">Knead To Know</p>
      <p class="text-gray-400">
        Thank you for looking through our website! We hope you had a great experience here. If you encounter ANY problem
        during your visit, feel free to hit me up on the contact page or just email me with the provided mail address on
        your right! Make sure you come here often to read our articles alright? We pay a
        LOT of money to make this website soooo please come to our store :D
      </p>
      <div class="flex gap-2">
        <a href="https://facebook.com/" target="_blank">
          <img src="{{ asset('images/icons/001-facebook@2x.png') }}" alt="facebook" class="size-10">
        </a>
        <a href="https://x.com/" target="_blank">
          <img src="{{ asset('images/icons/002-twitter@2x.png') }}" alt="twitter" class="size-10">
        </a>
      </div>
    </div>

    <div class="flex flex-1 flex-col gap-6">
      <p class="text-lg font-semibold">Useful links</p>
      <a href="#" target="_blank">Blog</a>
      <a href="#" target="_blank">Hewan</a>
      <a href="{{ route('gallery.index') }}" target="_blank">Galeri</a>
      <a href="#" target="_blank">Testimonial</a>
    </div>

    <div class="flex flex-1 flex-col gap-6">
      <p class="text-lg font-semibold">Privacy</p>
      <a href="#" target="_blank">Karir</a>
      <a href="{{ route('about') }}" target="_blank">Tentang Kami</a>
      <a href="{{ route('contact.index') }}" target="_blank">Kontak Kami</a>
      <a href="#" target="_blank">Servis</a>
    </div>

    <div class="flex-2 flex flex-col gap-6">
      <p class="text-lg font-semibold">
        Contact Info
      </p>
      <a href="mailto:{{ Str::remove(' ', $contactInfo->email) }}" class="align-center flex gap-4" target="_blank">
        <img src="{{ asset('images/icons/mail.png') }}" alt="mail-icon" class="h-4">
        {{ $contactInfo->email }}
      </a>
      <a href="tel:{{ Str::remove(' ', $contactInfo->phone) }}" class="align-center flex gap-4" target="_blank">
        <img src="{{ asset('images/icons/phone.png') }}" alt="phone-icon" class="h-4">
        {{ $contactInfo->phone }}
      </a>
      <a href="{{ 'https://www.google.com/maps/search/' . $contactInfo->address }}" class="align-center flex gap-4"
        target="_blank">
        <img src="{{ asset('images/icons/location.png') }}" alt="location-icon" class="h-6">
        {{ $contactInfo->address }}
      </a>
    </div>
  </div>

  <p class="mt-20 text-center">Copyright ©2026 All right reserved</p>
</div>
