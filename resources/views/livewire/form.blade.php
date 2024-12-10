<div>
    {{-- Close your eyes. Count to one. That is how long forever feels. --}}
    <div class="bg-white shadow rounded-lg p-6 mb-8">
        <form wire:submit='save'>
            <div class="mb-4">
                <x-label>Name</x-label>
                <x-input class="w-full" wire:model='title' required/>
            </div>

            <div class="mb-4">
                <x-label>Content</x-label>
                <x-textarea class="w-full" wire:model='content' required>
                </x-textarea>
            </div>

            <div class="mb-4">
                <x-label>
                    Category
                </x-label>
                <x-select class="w-full" wire:model='category_id' required>
                    <option value="" disabled>Select a category</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </x-select>
            </div>

            <div class="mb-4">
                <x-label>
                    Tags
                </x-label>
                <ul>
                    @foreach ($tags as $tag)
                        <li>
                            <label>
                                <x-checkbox wire:model='selectedTags' type="checkbox" value="{{ $tag->id }}" />
                                {{ $tag->name }}
                            </label>
                        </li>

                    @endforeach
                </ul>
            </div>

            <div class="flex justify-end">
                <x-button>
                    Save
                </x-button>
            </div>
        </form>
    </div>

    <div class="bg-white shadow rounded-lg p-6">
        <ul class="list-disc list-inside">
            @foreach ($posts as $post)
                <li>
                    {{ $post->title }}
                </li>
            @endforeach
        </ul>
    </div>
</div>
