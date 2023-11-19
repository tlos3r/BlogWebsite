<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Tag') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 mb-10 text-base font-bold text-gray-900">
                    All tag has
                </div>
                @if (session()->has('success'))
                    <p class="font-bold text-center text-green-600">
                        {{ session()->get('success') }}
                    </p>
                @endif
                <div class="flex items-center justify-center gap-5 m-5">
                    @foreach ($tags as $tag)
                        <div class="p-5 text-center bg-white rounded-lg shadow">
                            <a href="{{ route('tag.show', ['tag' => $tag]) }}"
                                class="font-medium text-gray-800 hover:text-gray-600">{{ $tag->name }}</a>
                            @if (Auth::user()->role == 'admin')
                                <div class="flex items-center justify-center gap-3 mt-5">
                                    <form action="{{ route('tags.edit', ['tag' => $tag]) }}" method="GET">
                                        @csrf
                                        <button
                                            class="px-3 py-2 text-white rounded-lg bg-sky-700 hover:bg-sky-300">Edit</button>
                                    </form>
                                    <form action="{{ route('tags.destroy', ['tag' => $tag]) }}" method="post">
                                        @method('DELETE')
                                        @csrf
                                        <button
                                            class="px-3 py-2 text-white bg-red-700 rounded-lg hover:bg-red-300">Delete</button>
                                    </form>
                                </div>
                            @endif
                        </div>
                    @endforeach
                </div>
                <div class="m-5">
                    {{ $tags->onEachSide(5)->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
