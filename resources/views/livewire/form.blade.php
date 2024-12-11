<div>
    {{-- Close your eyes. Count to one. That is how long forever feels. --}}
    <div class="bg-white shadow rounded-lg p-6 mb-8">
        <form wire:submit='save'>
            <div class="mb-4">
                <x-label>Name</x-label>
                <x-input class="w-full" wire:model='postCreate.title'/>
                <x-input-error for='postCreate.title'></x-input-error>
            </div>

            <div class="mb-4">
                <x-label>Content</x-label>
                <x-textarea class="w-full" wire:model='postCreate.content'>
                </x-textarea>
                <x-input-error for='postCreate.content'></x-input-error>
            </div>

            <div class="mb-4">
                <x-label>
                    Category
                </x-label>
                <x-select class="w-full" wire:model='postCreate.category_id'>
                    <option value="" disabled>Select a category</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </x-select>
                <x-input-error for='postCreate.category_id'></x-input-error>
            </div>

            <div class="mb-4">
                <x-label>
                    Tags
                </x-label>
                <ul>
                    @foreach ($tags as $tag)
                        <li>
                            <label>
                                <x-checkbox wire:model='postCreate.tags' type="checkbox" value="{{ $tag->id }}" />
                                {{ $tag->name }}
                            </label>
                        </li>

                    @endforeach
                    <x-input-error for='postCreate.tags'></x-input-error>
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
        <ul class="list-disc list-inside space-y-1">
            @foreach ($posts as $post)
                <li class="flex justify-between" wire:key="post-{{$post->id}}">
                    {{ $post->title }}

                    <div>
                        <x-button wire:click="edit({{$post->id}})">
                            Edit
                        </x-button>
                        <x-danger-button wire:click="destroy({{$post->id}})">
                            Delete
                        </x-danger-button>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>

    {{-- @if ($open)
        <div class="bg-gray-800 bg-opacity-25 fixed inset-0">
            <div class="py-12">
                <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white shadow rounded-lg p-6">
                        <form wire:submit='update'>
                            <div class="mb-4">
                                <x-label>Name</x-label>
                                <x-input class="w-full" wire:model='postEdit.title' required/>
                            </div>

                            <div class="mb-4">
                                <x-label>Content</x-label>
                                <x-textarea class="w-full" wire:model='postEdit.content' required>
                                </x-textarea>
                            </div>

                            <div class="mb-4">
                                <x-label>
                                    Category
                                </x-label>
                                <x-select class="w-full" wire:model='postEdit.category_id' required>
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
                                                <x-checkbox wire:model='postEdit.selectedTags' type="checkbox" value="{{ $tag->id }}" />
                                                {{ $tag->name }}
                                            </label>
                                        </li>

                                    @endforeach
                                </ul>
                            </div>

                            <div class="flex justify-end">
                                <x-danger-button wire:click="$set('open', false)" class="mr-2">
                                    Cancel
                                </x-danger-button>
                                <x-button>
                                    Edit
                                </x-button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endif --}}

    <form wire:submit='update'>
        <x-dialog-modal wire:model='postEdit.open'>
            <x-slot name="title">
                Delete Post
            </x-slot>

            <x-slot name="content">
                <div class="mb-4">
                    <x-label>Name</x-label>
                    <x-input class="w-full" wire:model='postEdit.title'/>
                    <x-input-error for='postEdit.title'></x-input-error>
                </div>

                <div class="mb-4">
                    <x-label>Content</x-label>
                    <x-textarea class="w-full" wire:model='postEdit.content'>
                    </x-textarea>
                    <x-input-error for='postEdit.content'></x-input-error>=
                </div>

                <div class="mb-4">
                    <x-label>
                        Category
                    </x-label>
                    <x-select class="w-full" wire:model='postEdit.category_id'>
                        <option value="" disabled>Select a category</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </x-select>
                    <x-input-error for='postEdit.category_id'></x-input-error>
                </div>

                <div class="mb-4">
                    <x-label>
                        Tags
                    </x-label>
                    <ul>
                        @foreach ($tags as $tag)
                            <li>
                                <label>
                                    <x-checkbox wire:model='postEdit.tags' type="checkbox" value="{{ $tag->id }}" />
                                    {{ $tag->name }}
                                </label>
                            </li>

                        @endforeach
                        <x-input-error for='postEdit.tags'></x-input-error>
                    </ul>
                </div>
            </x-slot>

            <x-slot name="footer">
                <div class="flex justify-end">
                    <x-danger-button wire:click="$set('postEdit.open', false)" class="mr-2">
                        Cancel
                    </x-danger-button>
                    <x-button>
                        Edit
                    </x-button>
                </div>
            </x-slot>
        </x-dialog-modal>
    </form>

    @push('js')
        <script>
            Livewire.on('post', function (comment) {
                alert(comment);
            });
        </script>
    @endpush
</div>
