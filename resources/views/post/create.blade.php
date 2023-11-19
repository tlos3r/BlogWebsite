<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Posts') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 font-bold text-gray-900">
                    {{ __('Form create post') }}
                </div>
                @if (session()->has('success'))
                    <p class="font-bold text-center text-green-600">
                        {{ session()->get('success') }}
                    </p>
                @endif
                <form action="{{ route('posts.store') }}" method="POST" class="mx-5">
                    @csrf
                    <div class="mt-5">
                        <x-input-label for="title" :value="'Title name :'" />
                        <x-text-input id="title" class="block w-full m-1" name="title" :value="old('title')" />
                        <x-input-error :messages="$errors->get('title')" class="mt-2" />
                    </div>
                    <div class="mt-5">
                        <x-input-label for="content" :value="'Post content :'" />
                        <textarea class="block w-full m-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                            name="content" id="content" cols="30" rows="5" :value="old('content')"></textarea>
                        <x-input-error :messages="$errors->get('content')" class="mt-2" />
                    </div>
                    <div class="mt-5">
                        <x-input-label for="category" :value="'Category :'" />
                        <select name="category_id"
                            class="bg-gray-50 border border-gray-300 text-gray-700 text-sm rounded-lg focus:border-indigo-500 focus:ring-indigo-500 block w-full p-2.5 ">
                            <option value="">No Category</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                        <x-input-error :messages="$errors->get('category')" class="mt-2" />
                    </div>
                    <div class="mt-5">
                        <x-input-label for="tag" :value="'Tag about this post (press crtl for multiable choice) :'" />
                        <select name="tag[]" id="tag" multiple="multiple"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:border-indigo-500 focus:ring-indigo-500 block w-full p-2.5 ">
                            @foreach ($tags as $tag)
                                <option value="{{ $tag->id }}" class="py-1">{{ $tag->name }}</option>
                            @endforeach
                        </select>
                        <x-input-error :messages="$errors->get('tag')" class="mt-2" />
                    </div>
                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                    <div class="flex items-center justify-end my-5">

                        <x-primary-button class="px-3 py-2 rounded-md outline-none">Submit</x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
