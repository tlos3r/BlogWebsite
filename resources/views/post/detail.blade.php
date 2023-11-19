<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Post') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <p class="py-5 text-3xl font-bold">{{ $post->title }}</p>
                <p class="pb-5 font-mono">By - {{ $post->user->name }} |
                    {{ \Carbon\Carbon::parse($post->created_at)->toFormattedDateString() }}</p>
                @if ($post->category != null)
                    <p class="pb-5">Category : <a class="font-bold"
                            href="{{ route('category.show', ['category' => $post->category]) }}">{{ $post->category->name ?? 'null' }}</a>
                    </p>
                @endif
                @foreach ($post->tags->pluck('slug') as $tag)
                    <a class="p-1 leading-5 text-white bg-gray-600 rounded-md hover:bg-gray-300"
                        href="{{ route('tag.show', ['tag' => $tag]) }}">#{{ $tag }}</a>
                @endforeach

                <p class="py-3">
                    {{ $post->content }}
                </p>
                <img src="https://source.unsplash.com/random" alt="" class="mx-auto max-h-60">
            </div>
            <div class="flex flex-col bg-white shadow-sm">
                <h3 class="ml-5 text-4xl font-bold tracking-normal">Comments :</h3>
                <ul>
                    @foreach ($post->comments as $comment)
                        <li class="flex items-center gap-5 m-5">
                            <img src="{{ url('/directory/person.png') }}" alt="">
                            <p class="font-bold">{{ $comment->user->name }} : <span
                                    class="font-normal">{{ $comment->content }}</span></p>
                        </li>
                    @endforeach
                </ul>
                <form action="{{ route('comments.store') }}" class="flex" method="POST">
                    @csrf
                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                    <input type="hidden" name="post_id" value="{{ $post->id }}">
                    <input type="text"
                        class="w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                        name="content" placeholder="Comment something about this post...">
                    <x-primary-button class="ml-5">Submit</x-primary-button>
                </form>
            </div>

        </div>
    </div>
</x-app-layout>
