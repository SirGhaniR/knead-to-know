<div class="bg-gray-950 px-36 pb-8 pt-40 text-gray-200">
  <div class="gap-30 flex">
    <div class="flex-3 flex flex-col gap-14">
      <p class="text-xl font-bold">Tasty Food</p>
      <p class="text-gray-400">
        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab consequatur nulla nihil molestiae id enim dolores
        alias! Consequuntur, temporibus corporis! Iste perspiciatis unde id nam ex necessitatibus neque reprehenderit
        consequuntur repellat labore asperiores inventore, ipsam beatae exercitationem, consectetur fugiat eius!
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
      <a href="mailto:tastyfood@gmail.com" class="align-center flex gap-4" target="_blank">
        <img src="{{ asset('images/icons/mail.png') }}" alt="mail-icon" class="h-4">
        tastyfood@gmail.com
      </a>
      <a href="tel:+6281234567890" class="align-center flex gap-4" target="_blank">
        <img src="{{ asset('images/icons/phone.png') }}" alt="phone-icon" class="h-4">
        +62 812 3456 7890
      </a>
      <a href="https://www.google.com/maps/search/Kota%20Bandung" class="align-center flex gap-4" target="_blank">
        <img src="{{ asset('images/icons/location.png') }}" alt="location-icon" class="h-6">
        Kota Bandung, Jawa barat
      </a>
    </div>
  </div>

  <p class="mt-20 text-center">Copyright ©2026 All right reserved</p>
</div>
