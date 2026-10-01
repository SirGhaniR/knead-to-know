<x-layout.app title="Kontak - KNEAD TO KNOW">
  <x-section.shared.hero />
  {{-- Form Contact --}}
  <div class="flex flex-col gap-6 px-4 py-12 sm:gap-8 sm:px-6 md:px-8 lg:gap-10 lg:px-20 lg:py-24">
    <p class="text-lg font-bold sm:text-xl" data-aos="fade-down" data-aos-delay="80" data-aos-duration="300">KONTAK KAMI
    </p>
    <x-ui.error />
    <form class="flex flex-col gap-4 sm:gap-6" action="{{ route('contact.store') }}" method="post">
      @csrf
      <div class="flex flex-col gap-4 lg:flex-row lg:gap-2">
        <div class="flex flex-1 flex-col gap-2">
          <x-ui.input id="subject" name="subject" data-aos="fade-right" data-aos-delay="100" data-aos-duration="400"
            placeholder="Subject" />
          <x-ui.input id="name" name="name" data-aos="fade-right" data-aos-delay="150" data-aos-duration="400"
            placeholder="Name" />
          <x-ui.input id="email" name="email" data-aos="fade-right" data-aos-delay="200" data-aos-duration="400"
            placeholder="Email" />
        </div>
        <div class="flex-1">
          <x-ui.textarea id="message" name="message" data-aos="fade-right" data-aos-delay="150"
            data-aos-duration="400" placeholder="Message" />
        </div>
      </div>
      <button
        class="lg:px-18 w-full rounded-lg bg-gray-900 px-4 py-6 text-center font-bold text-gray-200 hover:opacity-90"
        data-aos="fade-up" data-aos-delay="200" data-aos-duration="400" type="submit">KIRIM</button>
    </form>
  </div>

  {{-- Contacts Contact --}}
  <div
    class="lg:pb-30 flex flex-col items-center gap-6 px-4 py-12 sm:flex-row sm:justify-center sm:gap-8 md:gap-12 lg:gap-40 lg:pt-10">
    <x-ui.contact-icon data-aos="fade-up" data-aos-delay="100" data-aos-duration="400" title="EMAIL" icon="mail_bg.png"
      description="{{ $contactInfo->email }}" />
    <x-ui.contact-icon data-aos="fade-up" data-aos-delay="150" data-aos-duration="400" title="PHONE"
      icon="phone_bg.png" description="{{ $contactInfo->phone }}" />
    <x-ui.contact-icon data-aos="fade-up" data-aos-delay="200" data-aos-duration="400" title="LOCATION"
      icon="location_bg.png" description="{{ $contactInfo->address }}" />
  </div>

  {{-- Maps Contact --}}
  <div class="lg:py-30 h-128 bg-gray-200 px-4 py-8 sm:h-80 md:h-96 lg:h-screen lg:px-20">
    <iframe
      class="h-full w-full rounded-xl shadow-lg outline-1 outline-gray-300 transition duration-300 hover:shadow-2xl"
      data-aos="zoom-in" data-aos-delay="100" data-aos-duration="500"
      src="{{ 'https://maps.google.com/maps?width=650&height=400&hl=en&q=' . $contactInfo->address . '&t=&z=14&ie=UTF8&iwloc=B&output=embed' }}"
      allowfullscreen loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    <div class="text-2xs mt-2 text-center leading-3 opacity-75 sm:text-xs" data-aos="fade-up" data-aos-delay="150"
      data-aos-duration="400">
      <a href="https://www.embedgooglemap.net/?utm_source=embed&utm_medium=referral&utm_campaign=map_embed"
        target="_blank" rel="noopener">Embed Google Map</a>
    </div>
  </div>
</x-layout.app>
