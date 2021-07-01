<div>
    <div class="block w-full">
        <x-Admin::flash></x-Admin::flash>
    </div>

    <table class="min-w-full">
        <thead>
        <tr>
            <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">{{ __('Theme Name') }}</th>
            <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">{{ __('Installed') }}</th>
            <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">{{ __('Active Theme') }}</th>
        </tr>
        </thead>

        <tbody class="bg-white">
            @foreach ($themes as $theme)
                <tr>
                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                        <div class="leading-5 font-medium text-gray-900">
                            {{ $theme->packageName() }}
                        </div>
                    </td>
                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                        @if ($installed->where('name', $theme->packageName())->isNotEmpty())
                            <button class="p-2 bg-red-600 rounded-md text-white font-medium
                                tracking-wide hover:bg-red-700">
                                {{ __('Uninstall Theme') }}
                            </button>
                        @else
                            <button class="p-2 bg-green-600 rounded-md text-white font-medium
                                tracking-wide hover:bg-green-700">
                                {{ __('Install Theme') }}
                            </button>
                        @endif
                    </td>
                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                        @if ($installed->where('name', $theme->packageName())->isNotEmpty())
                            @if ($installed->where('name', $theme->packageName())->pluck('is_active'))
                                <button class="p-2 bg-green-600 rounded-md text-white font-medium
                                tracking-wide hover:bg-green-700 disabled:opacity-50 ..." disabled>
                                    {{ __('Active Theme') }}
                                </button>
                            @else
                                <button class="p-2 bg-green-600 rounded-md text-white font-medium
                                tracking-wide hover:bg-green-700">
                                    {{ __('Activate') }}
                                </button>
                            @endif
                        @else
                            <button class="p-2 bg-green-600 rounded-md text-white font-medium
                                tracking-wide hover:bg-green-700">
                                {{ __('Install Theme') }}
                            </button>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
