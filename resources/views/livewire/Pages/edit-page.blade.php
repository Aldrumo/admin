<div class="inline">
    <button class="p-2 bg-indigo-600 rounded-md text-white font-medium tracking-wide hover:bg-indigo-500 ml-3"
        wire:click="toggleModel">
        <x-heroicon-s-pencil-alt class="w-4 h-4"/>
    </button>

    @if ($modalOpen)
        <div x-data="{}" class="modal fixed top-0 left-0 w-full h-full outline-none show"
             id="editPageModel-{{ $page->id }}" tabindex="-1" role="dialog">
            <div class="modal-dialog relative w-full h-full pointer-events-none max-w-full mx-auto px-4 sm:px-0" role="document">
                <div class="relative flex flex-col w-full h-full pointer-events-auto bg-white border border-gray-300">
                    <form class="h-full">
                        <div class="flex items-start justify-between p-4 border-b border-gray-300 rounded-t">
                            <h5 class="mb-0 text-xl pt-2 leading-normal">
                                {{ $page->title }}
                            </h5>
                            <div class="flex items-center justify-end">
                                <button type="button" class="inline-block font-normal text-center px-3 py-2 leading-normal text-base rounded cursor-pointer text-white bg-gray-600 mr-2" wire:click="toggleModel">
                                    {{ __('Cancel') }}
                                </button>

                                <div>
                                    <button @click.prevent="processPage()" type="button" class="inline-block
                                    font-normal text-center px-3 py-2 leading-normal text-base rounded cursor-pointer
                                    text-white bg-indigo-600">
                                        {{ __('Save') }}
                                    </button>
                                </div>
{{--                                <div x-show="processing" class="hidden">--}}
{{--                                    <button disabled type="submit" class="inline-block font-normal text-center px-3 py-2 leading-normal text-base rounded cursor-default text-white bg-indigo-600">--}}
{{--                                        {{ __('Saving') }}--}}
{{--                                    </button>--}}
{{--                                </div>--}}
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
</div>
<script>
    function processPage()
    {
        var iframe = document.getElementById('content-editor');
        var blocks = iframe.contentDocument.getElementsByClassName('content-editor');

        for (let block of blocks) {
            console.log(block.innerHTML);
        }
    };
</script>
