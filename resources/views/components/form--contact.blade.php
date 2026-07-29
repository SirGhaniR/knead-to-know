<div class="flex flex-col gap-10 px-20 py-24">
  <p class="text-xl font-bold">KONTAK KAMI</p>
  <form action="/message" method="post" class="flex flex-col gap-6">
    @csrf
    <div class="flex gap-2">
      <div class="flex flex-1 flex-col gap-2">
        <input type="text" name="subject" id="subject" placeholder="Subject"
          class="w-full rounded-lg px-4 py-8 outline-1 outline-gray-800">
        <input type="text" name="name" id="name" placeholder="Name"
          class="w-full rounded-lg px-4 py-8 outline-1 outline-gray-800">
        <input type="text" name="email" id="email" placeholder="Email"
          class="w-full rounded-lg px-4 py-8 outline-1 outline-gray-800">
      </div>
      <div class="flex-1">
        <textarea name="message" id="message" placeholder="Message"
          class="field-sizing-fixed h-full w-full rounded-lg px-4 py-8 outline-1 outline-gray-800"></textarea>
      </div>
    </div>
    <button type="submit" class="w-full rounded-lg bg-gray-900 p-6 font-bold text-gray-200">KIRIM</button>
  </form>
</div>
