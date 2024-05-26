<!-- resources/views/challenge/comments/edit.blade.php -->

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
        <div class="container mx-auto my-8">
            <h1 class="text-center text-3xl font-bold mb-4">Edit Comment</h1>
            <form action="{{ route('comments.update', ['comment' => $comment->id]) }}" method="post">
                @csrf
                @method('PATCH')
                <div class="mb-4">
                    <label for="content" class="block text-lg font-medium text-gray-600">Edit Comment:</label>
                    <input type="text" id="content" name="content" class="mt-1 p-2 w-full border rounded-md" value="{{ $comment->content }}">
                </div>
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg">
                    Update Comment
                </button>
            </form>
        </div>
    </main>
    @include('challenge.partials._script')
</body>

</html>
