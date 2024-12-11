<div>
    {{-- Because she competes with no one, no one can compete with her. --}}
    @if (count($comments))
        <div class="bg-white shadow rounded-lg p-6 mb-8">
            <ul>
                @foreach ($comments as $comment)
                    <li class="flex justify-between">
                        {{ $comment }}
                    </li>

                @endforeach
            </ul>
        </div>
    @endif
</div>
