<div>
    {{-- The whole world belongs to you. --}}

    <x-button wire:click='decrease'> - </x-button>
    {{ $count}}
    <x-button wire:click='increase'> + </x-button>
    <x-button wire:click='resetCounter'>Reset</x-button>

</div>
