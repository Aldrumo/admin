<h5 class="mb-0 text-xl pt-2 leading-normal flex">
    @if ($edit)
        <input type="text" name="page-title" wire:model="title">

        <button class="text-green-600 hover:text-green-700 ml-3 focus:outline-none" wire:click.prevent="toggleEdit">
            <x-fas-save class="w-4 h-4"/>
        </button>
    @else
        {{ $title }}

        <button class="text-green-600 hover:text-green-700 ml-3 focus:outline-none" wire:click.prevent="toggleEdit">
            <x-heroicon-s-pencil-alt class="w-4 h-4"/>
        </button>
    @endif
</h5>
