<div>
    <button class="px-6 py-3 bg-indigo-600 rounded-md text-white font-medium tracking-wide hover:bg-indigo-500"
        wire:click="toggleModel">
        New Page
    </button>

    @if ($modalOpen)
        <div class="modal fixed top-0 left-0 w-full h-full outline-none show" id="exampleModalTwo" tabindex="-1" role="dialog">
            <div class="modal-dialog relative w-auto pointer-events-none max-w-lg my-8 mx-auto px-4 sm:px-0" role="document">
                <div class="relative flex flex-col w-full pointer-events-auto bg-white border border-gray-300 rounded-lg">
                    <div class="flex items-start justify-between p-4 border-b border-gray-300 rounded-t">
                        <h5 class="mb-0 text-lg leading-normal">Modal title</h5>
                        <button type="button" class="close" wire:click="toggleModel">&times;</button>
                    </div>
                    <div class="relative flex p-4">
                        ...
                    </div>
                    <div class="flex items-center justify-end p-4 border-t border-gray-300">
                        <button type="button" class="inline-block font-normal text-center px-3 py-2 leading-normal text-base rounded cursor-pointer text-white bg-gray-600 mr-2" wire:click="toggleModel">Close</button>
                        <button type="button" class="inline-block font-normal text-center px-3 py-2 leading-normal text-base rounded cursor-pointer text-white bg-blue-600">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
