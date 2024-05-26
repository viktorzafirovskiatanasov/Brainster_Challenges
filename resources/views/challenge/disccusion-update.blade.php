<!-- resources/views/challenge/discussion-edit.blade.php -->

@extends('challenge.partials._head')

@section('script')
    <!-- Include any additional scripts needed for editing here -->
@endsection

<body class="bg-zinc-100">
    <nav>
        @include('layouts.navigation')
    </nav>
    <main>
        <div class="container mx-auto mt-8 p-8 max-w-md bg-white border rounded shadow-lg">
            <h2 class="text-2xl font-bold mb-6">Edit Discussion</h2>
            <form method="POST" action="{{ route('discussions.update', ['discussion' => $discussion->id]) }}"
                enctype="multipart/form-data">
                @csrf
                @method('PUT') <!-- Use the PUT method for updates -->

                <div class="mb-4">
                    <label for="title" class="block text-sm font-medium text-gray-600">Title:</label>
                    <input type="text" name="title" id="title" class="mt-1 p-2 w-full border rounded-md"
                        value="{{ old('title', $discussion->title) }}" required>
                </div>
                <div class="mb-4">
                    <label for="image" class="block text-sm font-medium text-gray-600">Image:</label>
                    @if ($discussion->image)
                        <img src="{{ Storage::url('public/images/' . $discussion->image) }}" alt="Current Image"
                            class="mb-2 w-48 h-32 object-cover rounded-lg">
                    @else
                        <p>No current image</p>
                    @endif
                    <input type="file" name="image" id="image" class="mt-1 p-2 w-full border rounded-md">
                </div>
                <div class="mb-4">
                    <label for="description" class="block text-sm font-medium text-gray-600">Description:</label>
                    <textarea name="description" id="description" class="mt-1 p-2 w-full border rounded-md" rows="3" required>{{ old('description', $discussion->description) }}</textarea>
                </div>

                <div class="mb-4">
                    <label for="category_id" class="block text-sm font-medium text-gray-600">Category:</label>
                    <select name="category_id" id="category_id" class="mt-1 p-2 w-full border rounded-md" required>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}"
                                {{ old('category_id', $discussion->category_id) == $category->id ? 'selected' : '' }}>
                                {{ $category->title }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <button type="submit" class="bg-blue-500 text-white font-bold py-2 px-4 rounded">Update</button>
            </form>
        </div>
    </main>
    @include('challenge.partials._script')
</body>
