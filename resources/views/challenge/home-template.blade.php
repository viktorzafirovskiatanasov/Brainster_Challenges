<html>

<head>
    @include('challenge.partials._head')
    @yield('script')
</head>

<body class="bg-zinc-100">
    <nav>
        @include('layouts.navigation')
    </nav>
    <main>
        <x-home-view>
        </x-home-view>
        
    </main>
    @include('challenge.partials._script')
</body>
</html>
