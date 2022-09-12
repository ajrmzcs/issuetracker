@if (session('success'))
    <div class="mt-4 px-4 py-3 leading-normal text-green-700 bg-green-100 rounded-lg" role="alert">
        <p>{{ session('success') }}</p>
    </div>
@endif
