<div>
    <table class="min-w-full">
        <thead>
        <tr>
            <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Title</th>
            <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Path</th>
            <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Active</th>
            <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Last Updated</th>
            <th class="px-6 py-3 border-b border-gray-200 bg-gray-50"></th>
        </tr>
        </thead>

        <tbody class="bg-white">
        @forelse ($pages as $page)
            <tr>
                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                    <div class="text-sm leading-5 font-medium text-gray-900">
                        {{ $page->title }}
                    </div>
                </td>

                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                    <div class="text-sm leading-5 text-gray-900">
                        {{ $page->slug }}
                    </div>
                </td>

                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                    @if ($page->is_active)
                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Active</span>
                    @else
                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">Inactive</span>
                    @endif
                </td>

                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5 text-gray-500">
                    {{ $page->updated_at->format('M jS Y, H:i') }}
                </td>

                <td class="px-6 py-4 whitespace-no-wrap text-right border-b border-gray-200 text-sm leading-5 font-medium">
                    <button class="p-2 bg-indigo-600 rounded-md text-white font-medium tracking-wide hover:bg-indigo-500 ml-3">
                        <x-heroicon-s-pencil-alt class="w-4 h-4"/>
                    </button>

                    <button class="p-2 bg-red-600 rounded-md text-white font-medium tracking-wide hover:bg-red-500 ml-3">
                        <x-heroicon-s-trash class="w-4 h-4"/>
                    </button>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="5">
                    <div class="text-sm leading-5 font-medium text-gray-900">
                        Create your first page to get started with Aldrumo!
                    </div>
                </td>
            </tr>
        @endforelse
        </tbody>
    </table>
</div>
