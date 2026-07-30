<div class="flex flex-col gap-10 px-20 py-24">
  <p class="text-xl font-bold">KONTAK KAMI</p>
  <form action="{{ url('contact.store') }}" method="post" class="flex flex-col gap-6">
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
    <x-ui.button :href="'#'" variant="dark" full class="p-6! rounded-lg">KIRIM</x-ui.button>
  </form>
</div>
