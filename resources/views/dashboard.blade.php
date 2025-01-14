<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            {{-- @livewire('create-post', ['title' => 'Create Post', 'user' => 1]) --}}
            {{-- @livewire('counter') --}}
            {{-- @livewire('countries') --}}
            @livewire('form')

            <div class="mt-8">
                @livewire('comments')
            </div>
        </div>
    </div>
</x-app-layout>
