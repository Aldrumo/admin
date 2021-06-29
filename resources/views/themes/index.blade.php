<x-Admin::app-layout>
    <x-slot name="header">
        {{ __('Themes') }}
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <livewire:theme-admin></livewire:theme-admin>
            </div>
        </div>
    </div>
</x-Admin::app-layout>
