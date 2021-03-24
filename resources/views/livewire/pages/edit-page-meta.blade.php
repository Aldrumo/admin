<div>
    @if ($edit)
        <form class="mb-0 text-xl leading-normal flex">
            <input type="text" class="rounded-md w-60 mr-4" name="page-title" wire:model="page.title">
            <input type="text" class="rounded-md w-60" name="page-slug" wire:model="page.slug">

            <button class="text-green-600 hover:text-green-700 ml-3 focus:outline-none" wire:click.prevent="save">
                <x-fas-check class="w-4 h-4"/>
            </button>
        </form>
    @else
        <div class="flex">
            <div>
                <h5 class="mb-0 text-xl leading-normal">
                    {{ $page->title }}
                </h5>
                <small>({{ __('Page Slug') }}: {{ $page->slug }})</small>
            </div>

            <button class="text-green-600 hover:text-green-700 ml-3 focus:outline-none mt-2 mb-auto" wire:click.prevent="toggleEdit">
                <x-heroicon-s-pencil-alt class="w-4 h-4"/>
            </button>
        </div>
    @endif
</div>
