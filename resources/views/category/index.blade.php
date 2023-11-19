<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Category') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 mb-10 text-base font-bold text-gray-900">
                    All categories has
                </div>
                @if (session()->has('success'))
                    <p class="font-bold text-center text-green-600">
                        {{ session()->get('success') }}
                    </p>
                @endif
                <div class="flex items-center justify-center gap-5 m-5">
                    @foreach ($categories as $category)
                        <div class="p-5 text-center bg-white rounded-lg shadow">
                            <a href="{{ route('category.show', ['category' => $category]) }}"
                                class="font-medium text-black">{{ $category->name }}</a>
                            @if (Auth::user()->role == 'admin')
                                <div class="flex items-center justify-center gap-3 mt-5">
                                    <form action="{{ route('categories.edit', ['category' => $category]) }}"
                                        method="GET">
                                        @csrf
                                        <button
                                            class="px-3 py-2 text-white rounded-lg bg-sky-700 hover:bg-sky-300">Edit</button>
                                    </form>
                                    <form action="{{ route('categories.destroy', ['category' => $category]) }}"
                                        method="post">
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
                    {{ $categories->onEachSide(5)->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
