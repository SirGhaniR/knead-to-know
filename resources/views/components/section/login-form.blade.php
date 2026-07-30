</div>
<div class="mx-auto my-24 flex h-fit w-2/5 flex-col gap-16 rounded-2xl px-10 py-14 shadow-md outline-1 outline-gray-300">
  <x-ui.section-title :title="'LOGIN'" :centered="'true'" class="text-3xl!" />
  <form action="{{ url('/login') }}" method="post">
    @csrf
    <div class="flex flex-col gap-3">
      <x-ui.input :name="'email'" :id="'email'" :placeholder="'Email'" class="px-8! py-6! outline-gray-500!" />
      <x-ui.input :name="'password'" :id="'password'" :placeholder="'Password'" class="px-8! py-6! outline-gray-500!" />
    </div>
    <button type="submit"
      class="mt-16 w-full rounded-lg bg-gray-900 p-6 text-center font-bold text-gray-200 transition-colors hover:opacity-90">KIRIM</button>
  </form>
</div>
