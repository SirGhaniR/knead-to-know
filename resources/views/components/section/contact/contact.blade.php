@props([
    'errors' => [],
])

{{-- Form Contact --}}
<div class="flex flex-col gap-10 px-20 py-24">
  <p class="text-xl font-bold">KONTAK KAMI</p>
  <x-ui.error />
  <form action="{{ route('contact.store') }}" method="post" class="flex flex-col gap-6">
    @csrf
    <div class="flex gap-2">
      <div class="flex flex-1 flex-col gap-2">
        <x-ui.input name="subject" id="subject" placeholder="Subject" />
        <x-ui.input name="name" id="name" placeholder="Name" />
        <x-ui.input name="email" id="email" placeholder="Email" />
      </div>
      <div class="flex-1">
        <x-ui.textarea name="message" id="message" placeholder="Message" />
      </div>
    </div>
    <button type="submit"
      class="px-18 w-full rounded-lg bg-gray-900 py-6 text-center font-bold text-gray-200 transition-colors hover:opacity-90">KIRIM</button>
  </form>
</div>

{{-- Contacts Contact --}}
<div class="pb-30 mx-auto flex justify-center gap-40 pt-10">
  <x-ui.contact-icon icon="mail_bg.png" title="EMAIL" description="tastyfood@gmail.com" />
  <x-ui.contact-icon icon="phone_bg.png" title="PHONE" description="+62 812 3456 7890" />
  <x-ui.contact-icon icon="location_bg.png" title="LOCATION" description="Kota Bandung, Jawa Barat" />
</div>

{{-- Maps Contact --}}
<div class="py-30 h-screen bg-gray-200 px-20">
  <iframe class="h-full w-full rounded-xl shadow-lg outline-1 outline-gray-300"
    src="https://maps.google.com/maps?width=650&height=400&hl=en&q=Kota%20Bandung&t=&z=14&ie=UTF8&iwloc=B&output=embed"
    allowfullscreen loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
  <div style="font-size: 10px;opacity:.75;line-height: 10px;">
    <a href="https://www.embedgooglemap.net/?utm_source=embed&utm_medium=referral&utm_campaign=map_embed" target="_blank"
      rel="noopener">Embed Google Map</a>
  </div>
</div>
