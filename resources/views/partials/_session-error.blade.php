@if ($errors->any())
    <div class="mt-4 mx-12 px-4 py-3 leading-normal text-red-700 bg-red-100 rounded-lg" role="alert">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
@if (session('error'))
    <div class="mt-4 px-4 py-3 leading-normal text-red-700 bg-red-100 rounded-lg" role="alert">
        <p>{{ session('error') }}</p>
    </div>
@endif
