<!DOCTYPE html>
<head>
    @include('layouts.partials.head')
    @yield('script')
</head>
<html>
    
    <body>
        @include('layouts.partials.navbar')
        @include('layouts.partials.heroBanner')
        <div>
            @yield('content')
        </div>
       @include('layouts.partials.footer')
       @include('layouts.partials.scripts')
       @yield('script')
    </body>
</html>