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
