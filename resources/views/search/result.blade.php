<x-app-layout>
    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="flex p-6 text-gray-900">
                    <div class="flex flex-col gap-5 mx-10">
                        <h3 class="pb-10 text-2xl font-bold tracking-normal ">Search result</h3>
                        @if ($posts->count() == 0)
                            <p class="text-red-600">No result for word you search</p>
                        @endif
                        @foreach ($posts as $post)
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

                        <div class="m-5">
                            {{ $posts->onEachSide(5)->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
