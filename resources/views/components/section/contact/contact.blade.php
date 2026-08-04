@props([
    'contactInfo' => [],
])

{{-- Form Contact --}}
<div class="flex flex-col gap-6 px-4 py-12 sm:gap-8 sm:px-6 md:px-8 lg:gap-10 lg:px-20 lg:py-24">
  <p class="text-lg font-bold sm:text-xl">KONTAK KAMI</p>
  <x-ui.error />
  <form action="{{ route('contact.store') }}" method="post" class="flex flex-col gap-4 sm:gap-6">
    @csrf
    <div class="flex flex-col gap-4 lg:flex-row lg:gap-2">
      <div class="flex flex-1 flex-col gap-2">
        <x-ui.input name="subject" id="subject" placeholder="Subject" />
        <x-ui.input name="name" id="name" placeholder="Name" />
        <x-ui.input name="email" id="email" placeholder="Email" />
      </div>
      <div class="flex-1">
        <x-ui.textarea name="message" id="message" placeholder="Message" class="h-32 lg:h-full" />
      </div>
    </div>
    <button type="submit"
      class="lg:px-18 w-full rounded-lg bg-gray-900 px-4 py-3 text-center font-bold text-gray-200 transition-colors hover:opacity-90 sm:px-8 sm:py-4 lg:py-6">KIRIM</button>
  </form>
</div>

{{-- Contacts Contact --}}
<div
  class="lg:pb-30 flex flex-col items-center gap-6 px-4 py-12 sm:flex-row sm:justify-center sm:gap-8 md:gap-12 lg:gap-40 lg:pt-10">
  <x-ui.contact-icon icon="mail_bg.png" title="EMAIL" description="{{ $contactInfo->email }}" />
  <x-ui.contact-icon icon="phone_bg.png" title="PHONE" description="{{ $contactInfo->phone }}" />
  <x-ui.contact-icon icon="location_bg.png" title="LOCATION" description="{{ $contactInfo->address }}" />
</div>

{{-- Maps Contact --}}
<div class="lg:py-30 h-128 bg-gray-200 px-4 py-8 sm:h-80 md:h-96 lg:h-screen lg:px-20">
  <iframe class="h-full w-full rounded-xl shadow-lg outline-1 outline-gray-300"
    src="{{ 'https://maps.google.com/maps?width=650&height=400&hl=en&q=' . $contactInfo->address . '&t=&z=14&ie=UTF8&iwloc=B&output=embed' }}"
    allowfullscreen loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
  <div class="text-2xs mt-2 text-center leading-3 opacity-75 sm:text-xs">
    <a href="https://www.embedgooglemap.net/?utm_source=embed&utm_medium=referral&utm_campaign=map_embed"
      target="_blank" rel="noopener">Embed Google Map</a>
  </div>
</div>
