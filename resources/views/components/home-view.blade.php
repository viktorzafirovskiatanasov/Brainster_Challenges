<div class="container-fluid m-32">
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
                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg">
                    <a href="{{ route('dashboard') }}">
                        Go To Dashboard
                    </a>
                </button>
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
            {{-- {{ dd(Storage::url('public/' . $discussion->image)) }} --}}

            
                <a href="{{ route('single', ['id' => $discussion->id]) }}" class="w-full">
                    <div class="w-full lg:max-w-full flex bg-white p-8 rounded-lg">
                        <div class="flex-none">
                            @if ($discussion->image)
                                <img src="{{Storage::url('public/images/' . $discussion->image)}}" alt="Image"
                                    class="min-w-48 h-32 object-cover rounded-lg">
                            @else
                                <p>No image available</p>
                            @endif
                        </div>
                        <div class="flex-grow pl-16 pr-8">
                            <p class="text-gray-900 font-bold text-xl mb-2">{{ $discussion->title }}</p>
                            <p class="text-gray-700 text-base">{{ $discussion->description }}</p>
                        </div>
                        <div class="flex items-center">
                            <p class="text-gray-500 text-lg leading-none whitespace-nowrap">
                                {{ $discussion->category->title }} | {{ $discussion->user->username }}</p>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
</div>
