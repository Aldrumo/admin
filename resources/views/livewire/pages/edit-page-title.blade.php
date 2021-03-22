<div>
    @if ($edit)
        <form class="mb-0 text-xl leading-normal flex">
            <input type="text" class="rounded-md w-80" name="page-title" wire:model="title">

            <button class="text-green-600 hover:text-green-700 ml-3 focus:outline-none" wire:click.prevent="saveTitle">
                <x-fas-check class="w-4 h-4"/>
            </button>
        </form>
    @else
        <h5 class="mb-0 text-xl pt-2 leading-normal flex">
            {{ $title }}

            <button class="text-green-600 hover:text-green-700 ml-3 focus:outline-none" wire:click.prevent="toggleEdit">
                <x-heroicon-s-pencil-alt class="w-4 h-4"/>
            </button>
        </h5>
    @endif
</div>
