<div class="flex items-center justify-center px-4 py-24">
  <div
    class="w-full max-w-md bg-gray-50 px-6 py-10 text-gray-900 shadow-md outline-1 outline-gray-300 sm:px-10 sm:py-14">
    <p class="mb-4 text-center text-2xl font-bold sm:text-3xl">LOGIN</p>
    <p class="sm:mb-18 mb-8 text-center text-sm sm:text-base">Welcome! Login di sini untuk membuktikan kamu admin.</p>
    <x-ui.error />
    <form action="{{ url('/login') }}" method="post">
      @csrf
      <div class="mb-4 flex flex-col gap-3">
        <x-ui.input name="email" id="email" placeholder="Email" value="{{ old('email') }}"
          class="rounded-none! px-4! py-3! outline-gray-500! sm:px-8! sm:py-4!" />
        <x-ui.input type="password" name="password" id="password" placeholder="Password"
          class="rounded-none! px-4! py-3! outline-gray-500! sm:px-8! sm:py-4!" />
      </div>
      <button type="submit"
        class="w-full bg-gray-900 p-3 text-center font-bold text-gray-200 transition-colors hover:opacity-90 sm:p-4">
        KIRIM
      </button>
    </form>
  </div>
</div>
</div>
