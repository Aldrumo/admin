@if (session()->has($prefix . 'success') || session()->has($prefix . 'error'))
    <div x-data="{'showMsg': true}" x-init="setTimeout(function () { showMsg = false; }, 3000);">
        @if (session()->has($prefix . 'success'))
            <div class="bg-green-500 text-white p-2 mb-3" x-show.immediate.transition.out.duration.500ms="showMsg">
                {{ session($prefix . 'success') }}
            </div>
        @endif

        @if (session()->has($prefix . 'error'))
            <div class="bg-red-500 text-white p-2 mb-3" x-show.immediate.transition.out.duration.500ms="showMsg">
                {{ session($prefix . 'error') }}
            </div>
        @endif
    </div>
@endif
