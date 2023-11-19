<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Category') }}
        </h2>
        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                    <div class="p-6 text-2xl font-bold text-gray-900">
                        All every post has {{ $category->name }}
                    </div>

                    @if ($category->posts->count() == 0)
                        <p class="p-6 text-gray-900">No post have this tag</p>
                    @endif
                    @foreach ($category->posts->where('approved', 1) as $post)
                        <form action="{{ route('posts.show', ['post' => $post]) }}" method="get"
                            class="max-w-3xl m-5 max-h-40">
                            <div>
                                <a href="{{ route('posts.show', ['post' => $post]) }}"
                                    class="pb-5 text-2xl font-bold hover:text-gray-500">{{ $post->title }}</a>
                                <p class="font-mono">By - {{ $post->user->name }} |
                                    {{ \Carbon\Carbon::parse($post->created_at)->toFormattedDateString() }}</p>
                                <p class="my-3 line-clamp-3">{{ $post->content }}</p>
                            </div>
                            <div class="flex justify-end">
                                <x-primary-button>View more</x-primary-button>
                            </div>
                        </form>
                    @endforeach


                </div>
            </div>

    </x-slot>
</x-app-layout>
