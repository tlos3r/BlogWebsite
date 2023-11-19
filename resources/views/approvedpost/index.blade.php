<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Post Need Approved') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            @if (session()->has('success'))
                <p class="font-bold text-center text-green-600">
                    {{ session()->get('success') }}
                </p>
            @endif
            @if ($approvedposts->count() == 0)
                <p class="font-bold text-center ">
                    Don't have any post for checking
                </p>
            @endif
            <div class="flex flex-col overflow-hidden bg-white rounded-lg shadow-sm">
                @foreach ($approvedposts as $approvedpost)
                    <div class="p-5 m-5 rounded-lg shadow bg-zinc-100">
                        <p class="font-bold">{{ $approvedpost->title }} - Author: {{ $approvedpost->user->name }}</p>
                        <p class="truncate">{{ $approvedpost->content }}</p>
                        <div class="flex justify-end gap-3 mt-5 text-white">
                            <form action="{{ route('approveds.update', ['approved' => $approvedpost]) }}"
                                method="POST">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="id" value="{{ $approvedpost->id }}">
                                <input type="hidden" value="1" name="approved">
                                <button class="px-3 py-2 bg-green-600 rounded-md">Approved</button>
                            </form>
                            <form action="{{ route('approveds.destroy', ['approved' => $approvedpost]) }}"
                                method="POST">
                                @csrf
                                @method('DELETE')
                                <input type="hidden" name="id" value="{{ $approvedpost->id }}">
                                <button class="px-3 py-2 bg-red-600 rounded-md">Refuse</button>
                            </form>
                        </div>
                    </div>
                @endforeach
                <div class="m-5">
                    {{ $approvedposts->onEachSide(5)->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
