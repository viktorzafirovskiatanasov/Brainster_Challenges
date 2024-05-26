<!DOCTYPE html>
<head>
    @include('layouts.partials.head')
    @yield('script')
</head>
<html>
    
    <body>
        @include('layouts.partials.navbar')
        <div>
            @yield('content')
        </div>
       @include('layouts.partials.Loginfooter')
       @include('layouts.partials.scripts')
       @yield('script')
    </body>
</html>