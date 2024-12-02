<div>
    {{-- The Master doesn't talk, he acts. --}}
    {{ $title }}
    {{ $name }}
    {{ $email }}

    <input type="text" wire:model='name'>

    <x-button wire:click='save'>Save</x-button>

    {{ $name }}
</div>
