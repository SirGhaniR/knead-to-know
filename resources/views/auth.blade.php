<x-layout.app title="Login - KNEAD TO KNOW" :footer="false">
  <div class="flex min-h-screen flex-col items-center justify-center px-4 py-12 bg-gray-100" data-aos="fade-up"
    data-aos-duration="400">
    <a class="mb-8" data-aos="fade-down" data-aos-delay="100" data-aos-duration="300" href="{{ url('/') }}">
      <span class="text-6xl font-bold transition duration-150 hover:opacity-70 sm:text-6xl">KTK</span>
    </a>

    <div
      class="w-full max-w-md bg-gray-50 px-6 py-10 text-gray-900 shadow-md outline-1 outline-gray-300 sm:px-10 sm:py-14"
      data-aos="zoom-in" data-aos-delay="100" data-aos-duration="500">
      <p class="mb-4 text-center text-2xl font-bold sm:text-3xl" data-aos="fade-down" data-aos-delay="80"
        data-aos-duration="300">LOGIN</p>
      <p class="sm:mb-18 mb-8 text-center text-sm " data-aos="fade-up" data-aos-delay="120" data-aos-duration="400">
        Welcome! Login di sini untuk membuktikan kamu admin.</p>

      <x-ui.error />

      <form action="{{ url('/auth') }}" method="post">
        @csrf
        <div class="mb-4 flex flex-col gap-3">
          <x-ui.input class="rounded-none! px-4! py-3! outline-gray-500! sm:px-8! sm:py-4!" id="email"
            name="email" data-aos="fade-right" data-aos-delay="150" data-aos-duration="400"
            value="{{ old('email') }}" placeholder="Email" />
          <x-ui.input class="rounded-none! px-4! py-3! outline-gray-500! sm:px-8! sm:py-4!" id="password"
            name="password" data-aos="fade-right" data-aos-delay="200" data-aos-duration="400" type="password"
            placeholder="Password" />
        </div>
        <button
          class="w-full bg-gray-900 p-3 cursor-pointer text-center font-bold text-gray-200 hover:opacity-90 sm:p-4"
          data-aos="fade-up" data-aos-delay="250" data-aos-duration="400" type="submit">
          LOGIN
        </button>
      </form>
    </div>

    <p class="mt-8 text-center text-sm text-gray-500" data-aos="fade-up" data-aos-delay="300" data-aos-duration="400">
      <a class="underline" href="{{ url('/') }}">
        <i class="fa-solid fa-rotate-left"></i> Go to Knead To Know
      </a>
    </p>
  </div>
</x-layout.app>
