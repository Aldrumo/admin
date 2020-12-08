<x-Admin::app-layout>
    <x-slot name="header">
        {{ __('Pages') }}
    </x-slot>

    <x-slot name="sectionMenu">
        @livewire('create-page')
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                @livewire('pages-admin')
            </div>
        </div>
    </div>
</x-Admin::app-layout>
