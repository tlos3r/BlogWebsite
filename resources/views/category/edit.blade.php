<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Category') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    Edit category
                </div>
                @if (session()->has('success'))
                    <p clasnt-bold text-center text-green-600">
                        {{ session()->get('success') }}
                    </p>
                @endif
                <form action="{{ route('categories.update', ['category' => $category->slug]) }}" method="POST"
                    class="p-6">
                    @method('PUT')
                    @csrf
                    <div>
                        <label for="name"> Change your <span class="font-bold "> {{ $category->name }}</span>
                            into:</label>
                        <x-text-input id="name" class="block w-full m-1" name="name" :value="old('name')"
                            autofocus />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>
                    <div class="flex items-center justify-end">
                        <x-primary-button class="ms-3">Submit</x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
