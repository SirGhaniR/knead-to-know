@if ($errors->any())
  <div class="mb-6 border border-red-200 bg-red-50 px-4 py-3 text-red-600">
    <ul class="list-inside list-disc text-sm">
      @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
@endif

@if (session('success'))
  <div class="mb-6 border border-green-200 bg-green-50 px-4 py-3 text-green-600">
    {{ session('success') }}
  </div>
@endif

@if (session('error'))
  <div class="mb-6 border border-red-200 bg-red-50 px-4 py-3 text-red-600">
    {{ session('error') }}
  </div>
@endif
