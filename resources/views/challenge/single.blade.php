<!-- resources/views/challenge/single.blade.php -->

<html>

<head>
    @include('challenge.partials._head')
    @yield('script')
</head>

<body class="bg-zinc-200">
    <nav>
        @include('layouts.navigation')
    </nav>
    <main>
        <div class="py-12">
            <div class="col-4 offset-4 mb-12">
                <h1 class="text-center text-5xl font-extrabold">Welcome To The Forum</h1>
            </div>
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <div class="flex p-8">
                            <div class="flex-grow">
                                @if ($discussion->image)
                                    <img src="{{ Storage::url('public/images/' . $discussion->image) }}" alt="Image"
                                        class=" min-h-96 object-cover rounded-lg" style="max-width: 80%;">
                                @else
                                    <p>No image available</p>
                                @endif
                                <div class="mt-8">
                                    <p class="text-gray-900 font-bold text-xl mb-2">{{ $discussion->title }}</p>
                                    <p class="text-gray-500 text-extralight whitespace-wrap w-96">
                                        {{ $discussion->description }}</p>
                                </div>
                            </div>

                            <div class="flex-grow items-end justify-between">
                                <p class="text-gray-500 text-lg leading-none whitespace-nowrap text-center">
                                    {{ $discussion->user->username }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="my-8">
                    <h2 class="text-xl">Comments:</h2>
                    <button class="my-5 bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded-lg">
                        <a href="{{ route('discussions.comment.create', ['discussion' => $discussion->id]) }}">
                            Add Comment
                        </a>
                    </button>
                    @foreach ($discussion->comments as $comment)
                        <div class="max-w-7xl mx-auto flex items-center">
                            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg w-full">
                                <div class="p-6 text-gray-900 flex justify-between items-center">
                                    <div>
                                        <p class="mb-2">Posted by: <span
                                                class="text-black font-bold">{{ $comment->user->username }}</span></p>
                                        <p class="mb-2">{{ $comment->content }}</p>
                                    </div>
                                    <div class="flex items-center space-x-2">
                                        <form action="{{ route('comments.destroy', ['comment' => $comment->id]) }}"
                                            method="post"
                                            onsubmit="return confirm('Are you sure you want to delete this comment?')">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="text-red-500 px-4 mt-4" title="Delete Comment">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </form>
                                        <a href="{{ route('comments.edit', ['comment' => $comment->id]) }}"
                                            class="text-blue-500 px-4" title="Edit Comment">
                                            <i class="bi bi-pencil"></i>
                                        </a>
                                    </div>
                                    <div class="text-center">
                                        <p>{{ $comment->created_at->format('F d, Y \a\t H:i') }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </main>
    @include('challenge.partials._script')
</body>

</html>
