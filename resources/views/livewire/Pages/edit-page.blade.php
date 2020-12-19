<div class="inline">
    <button class="p-2 bg-indigo-600 rounded-md text-white font-medium tracking-wide hover:bg-indigo-500 ml-3"
        wire:click="toggleModel">
        <x-heroicon-s-pencil-alt class="w-4 h-4"/>
    </button>

    @if ($modalOpen)
        <div x-data="editPage()" class="modal fixed top-0 left-0 w-full h-full outline-none show"
             id="editPageModel-{{ $page->id }}" tabindex="-1" role="dialog">
            <div class="modal-dialog relative w-full h-full pointer-events-none max-w-full mx-auto px-4 sm:px-0" role="document">
                <div class="relative flex flex-col w-full h-full pointer-events-auto bg-white border border-gray-300">
                    <form wire:submit.prevent="savePage" class="h-full">
                        <div class="flex items-start justify-between p-4 border-b border-gray-300 rounded-t">
                            <h5 class="mb-0 text-xl pt-2 leading-normal">
                                {{ $page->title }}
                            </h5>
                            <div class="flex items-center justify-end">
                                <button type="button" class="inline-block font-normal text-center px-3 py-2 leading-normal text-base rounded cursor-pointer text-white bg-gray-600 hover:bg-gray-500 mr-2" wire:click="toggleModel">
                                    {{ __('Cancel') }}
                                </button>

                                <div wire:loading.remove wire:target="savePage">
                                    <button type="submit" class="inline-block
                                    font-normal text-center px-3 py-2 leading-normal text-base rounded cursor-pointer
                                    text-white bg-indigo-600 hover:bg-indigo-500" @click="processPage();">
                                        {{ __('Save') }}
                                    </button>
                                </div>
                                <div wire:loading wire:target="savePage">
                                    <button disabled type="submit" class="inline-block font-normal text-center px-3 py-2 leading-normal text-base rounded cursor-default text-white bg-indigo-600">
                                        {{ __('Saving') }}
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="relative w-full h-full text-left">
                            <iframe id="content-editor" class="w-full h-full"
                                    src="{{ route('admin.api.page.renderer', ['id' => $page->id]) }}"></iframe>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endif
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
                            'key': 'test',
                            'content': editor.innerHTML
                        });
                    }

                    return true;
                }
            }
        };
    </script>
</div>
