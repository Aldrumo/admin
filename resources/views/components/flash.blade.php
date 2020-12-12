<div>
    @if (session()->has('success'))
        <div class="bg-green-500 text-white p-2 mb-3">
            {{ session('success') }}
        </div>
    @endif

    @if (session()->has('error'))
        <div class="bg-red-500 text-white p-2 mb-3">
            {{ session('error') }}
        </div>
    @endif
</div>
