@extends('dashboard')

@section('content')
    <div class="container-fluid">
        <div class="row">
            @if (session('success'))
                <div class="alert alert-success bg-green-200 py-4 px-2 my-8 rounded-lg">
                    {{ session('success') }}
                </div>
            @endif
            <div class="col-4 offset-4">
                <h1 class="text-center text-5xl font-extrabold">Welcome To The Forum</h1>
            </div>
            <div class="col-4 offset-4 w-52 h-40 my-8">
                @if (Auth::check())
                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg mb-4">
                        <a href="{{ route('discussions.create') }}">
                            Add New Discussion
                        </a>
                    </button>
                    @if (Auth::user()->isAdmin())
                        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4  rounded-lg">
                            <a href="{{ route('dashboard') }}">
                                Approve Discussion
                            </a>
                        </button>
                    @endif
                @else
                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg">
                        <a href="{{ route('login') }}">
                            Log In to Add New Discussion
                        </a>
                    </button>
                @endif
            </div>
            <div class="col-8 offset-2 align-center">
                @foreach ($discussions as $discussion)
                    @if (Auth::user()->isAdmin() || Auth::user()->id === $discussion->user_id)
                        <div
                            class="w-full lg:max-w-full flex bg-white p-8 my-8 rounded-lg {{  $discussion->status === 'denied' ? 'bg-red-300' : ($discussion->status === 'approved' ? 'bg-green-300' : 'bg-yellow-100') }}">
                            <div class="flex-none">
                                @if ($discussion->image)
                                    <img src="{{ Storage::url('public/images/' . $discussion->image) }}" alt="Image"
                                        class="min-w-48 h-32 object-cover rounded-lg">
                                @else
                                    <p>No image available</p>
                                @endif
                            </div>
                            <div class="flex-grow pl-24">
                                <p class="text-gray-900 font-bold text-xl mb-2">{{ $discussion->title }}</p>
                                <p class="text-gray-700 text-base">{{ $discussion->description }}</p>
                            </div>
                            <div class="flex items-center justify-center min-w-52">
                                @if (Auth::user()->isAdmin())
                                    <form action="{{ route('discussions.approve', ['id' => $discussion->id]) }}"
                                        method="POST">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit" class="px-4 focus:outline-none text-green-500"><i
                                                class="bi bi-check-lg"></i></button>
                                    </form>
                                @endif
                                <form action="{{ route('discussions.denied', ['id' => $discussion->id]) }}"
                                    method="POST">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="px-4 focus:outline-none text-red-500"><i
                                            class="bi bi-trash-fill"></i></button>
                                </form>
                                <a href="{{ route('discussions.edit', ['discussion' => $discussion->id]) }}"
                                    class="px-4 text-blue-500">
                                    <i class="bi bi-pencil-square"></i>
                                </a>
                            </div>
                            <div class="flex items-center">
                                <p class="text-gray-500 text-lg leading-none whitespace-nowrap">
                                    {{ $discussion->category->title }} | {{ $discussion->user->username }}</p>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
@endsection
