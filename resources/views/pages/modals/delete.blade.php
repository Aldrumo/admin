@if ($deleteModal)
    <div class="modal-backdrop show"></div>
    <div class="modal fixed top-0 left-0 w-full h-full outline-none show" id="deletePageModal" tabindex="-1" role="dialog">
        <div class="modal-dialog relative w-auto pointer-events-none max-w-4xl my-8 mx-auto px-4 sm:px-0" role="document">
            <div class="relative flex flex-col w-full pointer-events-auto bg-white border border-gray-300 rounded-lg">
                <form wire:submit.prevent="confirmDelete">
                    <div class="flex items-start justify-between p-4 border-b border-gray-300 rounded-t">
                        <h5 class="mb-0 text-xl pt-2 leading-normal">
                            {{ __('Are you sure?') }}
                        </h5>
                    </div>
                    <div class="relative p-4">
                        <x-Admin::flash prefix="modal."></x-Admin::flash>

                        <p>{{ __('This action is unreversable and will remove the page and all associated data.') }}</p>

                        <div class="mt-3 flex">
                            <button type="button" class="inline-block font-normal text-center px-3 py-2 leading-normal text-base rounded cursor-pointer text-blue-950 bg-gray-200 hover:bg-gray-300 mr-2" wire:click="closeModal">
                                {{ __('No') }}
                            </button>

                            <div wire:loading.remove wire:target="confirmDelete">
                                <button type="submit" class="inline-block font-normal text-center px-3 py-2 leading-normal text-base rounded cursor-pointer text-white bg-green-600 hover:bg-green-700">
                                    {{ __('Yes') }}
                                </button>
                            </div>
                            <div wire:loading wire:target="confirmDelete">
                                <button disabled type="submit" class="inline-block font-normal text-center px-3 py-2 leading-normal text-base rounded cursor-default text-white bg-green-600 hover:bg-green-700">
                                    {{ __('Yes') }}
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endif
