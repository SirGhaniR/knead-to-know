@if ($errors->any())
  <div class="mb-6 rounded border border-red-200 bg-red-50 px-4 py-3 text-red-600">
    <ul class="list-inside list-disc text-sm">
      @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
@endif
