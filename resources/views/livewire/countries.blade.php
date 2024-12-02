<div>
    {{-- The best athlete wants his opponent at his best. --}}

    <form class="mb-4" wire:submit='addCountry'>
        <input type="text" class="mb-4" wire:model='country' placeholder="Enter a country" wire:keydown.space='increment'>
        <x-button>
            Add Country
        </x-button>
    </form>

    <ul class="list-disc list-inside space-y-2">
        @foreach ($countries as $index => $country)
            <li wire:key="country-{{ $index }}">
                <span wire:mouseenter="changeActive('{{ $country }}')">{{ $country }}</span>
                <x-danger-button wire:click='deleteCountry({{ $index }})'>x</x-danger-button>
            </li>
        @endforeach
    </ul>

    {{ $active}}
    {{ $count}}
</div>
