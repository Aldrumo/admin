<div>
<div class="block w-full">
        <x-Admin::flash></x-Admin::flash>
    </div>

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
                        <x-bi-toggle2-on class="w-8 h-8 text-green-800 cursor-pointer hover:text-red-800"
                            wire:click="toggleActive({{ $page->id }})" />
                    @else
                        <x-bi-toggle2-off class="w-8 h-8 text-red-800 cursor-pointer hover:text-green-800"
                            wire:click="toggleActive({{ $page->id }})" />
                    @endif
                </td>

                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5 text-gray-500">
                    {{ $page->updated_at->format('M jS Y, H:i') }}
                </td>

                <td class="px-6 py-4 whitespace-no-wrap text-right border-b border-gray-200 text-sm leading-5 font-medium">
                    <button class="p-2 bg-indigo-600 rounded-md text-white font-medium tracking-wide hover:bg-indigo-500 ml-3"
                        wire:click="editPage({{ $page->id }})">
                        <x-heroicon-s-pencil-alt class="w-4 h-4"/>
                    </button>

                    <button class="p-2 bg-red-600 rounded-md text-white font-medium tracking-wide hover:bg-red-500 ml-3"
                        wire:click="deletePage({{ $page->id }})">
                        <x-heroicon-s-trash class="w-4 h-4"/>
                    </button>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="5">
                    <div class="text-md leading-5 p-3 font-medium text-gray-900">
                        Create your first page to get started with Aldrumo!
                    </div>
                </td>
            </tr>
        @endforelse
        </tbody>
    </table>

    @include('Admin::pages.modals.edit')
    @include('Admin::pages.modals.delete')
    <script>
        function editPage()
        {
            return {
                blocks: @entangle('blocks'),
                processPage() {
                    let iframe = document.getElementById('content-editor');
                    let editors = iframe.contentDocument.getElementsByClassName('content-editor');

                    for (let editor of editors) {
                        this.blocks.push({
                            'slug': editor.id,
                            'content': editor.innerHTML
                        });
                    }

                    return true;
                }
            }
        };
    </script>
</div>
