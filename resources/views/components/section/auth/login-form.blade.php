@props([
    'errors' => [],
])

<div
  class="relative mx-auto my-24 h-fit w-2/5 bg-gray-50 px-10 py-14 text-gray-900 opacity-85 shadow-md outline-1 outline-gray-300">
  <x-ui.section-title :title="'LOGIN'" :centered="'true'" class="text-3xl! mb-4" />
  <p class="mb-18 text-center">Welcome! Login di sini untuk membuktikan kamu admin.</p>
  <x-ui.error />
  <form action="{{ url('/login') }}" method="post">
    @csrf
    <div class="mb-4 flex flex-col gap-3">
      <x-ui.input :name="'email'" :id="'email'" :placeholder="'Email'" value="{{ old('email') }}"
        class="px-8! py-4! outline-gray-500! rounded-0!" />
      <x-ui.input :type="'password'" :name="'password'" :id="'password'" :placeholder="'Password'"
        class="px-8! py-4! outline-gray-500! rounded-0!" />
    </div>
    <button type="submit"
      class="w-full bg-gray-900 p-4 text-center font-bold text-gray-200 transition-colors hover:opacity-90">KIRIM</button>
  </form>
</div>
</div>
