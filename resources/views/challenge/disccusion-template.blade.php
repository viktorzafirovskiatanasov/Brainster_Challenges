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
        @include('challenge.disccusion-create')
    </main>
    @include('challenge.partials._script')
</body>

</html>
