<div>
    <button class="px-6 py-3 bg-green-600 rounded-md text-white font-medium tracking-wide hover:bg-green-700"
        wire:click="toggleModal">
        New Page
    </button>

    @if ($modalOpen)
        <div class="modal-backdrop show"></div>
        <div class="modal fixed top-0 left-0 w-full h-full outline-none show" id="createPageModel" tabindex="-1" role="dialog">
            <div class="modal-dialog relative w-auto pointer-events-none max-w-4xl my-8 mx-auto px-4 sm:px-0" role="document">
                <div class="relative flex flex-col w-full pointer-events-auto bg-white border border-gray-300 rounded-lg">
                    <form wire:submit.prevent="createPage">
                        <div class="flex items-start justify-between p-4 border-b border-gray-300 rounded-t">
                            <h5 class="mb-0 text-xl pt-2 leading-normal">
                                {{ __('New Page') }}
                            </h5>
                            <div class="flex items-center justify-end">
                                <button type="button" class="inline-block font-normal text-center px-3 py-2 leading-normal text-base rounded cursor-pointer text-blue-950 bg-gray-200 hover:bg-gray-300 mr-2" wire:click="toggleModal">
                                    {{ __('Cancel') }}
                                </button>

                                <div wire:loading.remove wire:target="createPage">
                                    <button type="submit" class="inline-block font-normal text-center px-3 py-2 leading-normal text-base rounded cursor-pointer text-white bg-green-600 hover:bg-green-700">
                                        {{ __('Create') }}
                                    </button>
                                </div>
                                <div wire:loading wire:target="createPage">
                                    <button disabled type="submit" class="inline-block font-normal text-center px-3 py-2 leading-normal text-base rounded cursor-default text-white bg-green-600 hover:bg-green-700">
                                        {{ __('Creating') }}
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="relative p-4">
                            <div class="block w-full">
                                <x-Admin::flash prefix="modal."></x-Admin::flash>
                            </div>
                            <div class="block w-full">
                                <x-jet-label for="title" value="{{ __('Page Title') }}" class="font-bold text-base" />
                                <x-jet-input id="title" type="text" class="mt-1 block w-full" autocomplete="title" wire:model.lazy="page.title" />
                                <x-jet-input-error for="page.title" class="mt-2" />
                            </div>

                            <div class="block w-full my-5">
                                <x-jet-label for="template" value="{{ __('Template') }}" class="font-bold text-base" />
                                <select id="template" class="form-input rounded-md shadow-sm mt-1 block w-full" wire:model.lazy="page.template">
                                    <option value="">{{ __('Select Template') }}</option>

                                    @foreach ($templates as $template)
                                        <option value="{{ $template }}">{{ $template }}</option>
                                    @endforeach
                                </select>
                                <x-jet-input-error for="page.template" class="mt-2" />
                            </div>

                            <div class="block w-full">
                                <label for="is_home" class="flex items-center">
                                    <input id="is_home" type="checkbox" class="form-checkbox" name="is_home" wire:model="page.home">
                                    <span class="ml-2 text-gray-700 font-bold text-base">{{ __('Is Homepage?') }}</span>
                                </label>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endif
</div>
