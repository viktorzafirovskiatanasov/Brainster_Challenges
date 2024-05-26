<style>
    .nav-item.active .nav-link {
    color: white !important;
}
</style>
<header class="relative" style="height: 70vh">
    <nav
        class="navbar navbar-expand-lg navbar-dark bg-transparent fixed-top w-50 mx-auto d-flex justify-content-between">
        <a class="navbar-brand" href="{{ route('home') }}">Blog</a>

        <ul class="navbar-nav ml-auto">
            <li class="nav-item {{ request()->is('home') ? ' active' : '' }}">
                <a class="nav-link text-uppercase" href="{{ route('home') }}">Home</a>
            </li>
            <li class="nav-item {{ request()->is('about') ? ' active' : '' }}">
                <a class="nav-link text-uppercase" href="{{ route('about') }}">About</a>
            </li>
            <li class="nav-item {{ request()->is('post') ? ' active' : '' }}">
                <a class="nav-link text-uppercase" href="{{ route('post') }}">Sample Post</a>
            </li>
            <li class="nav-item {{ request()->is('contact') ? ' active' : '' }}">
                <a class="nav-link text-uppercase" href="{{ route('contact') }}">Contact</a>
            </li>
        </ul>
    </nav>
   
    <div class="hero h-100 background_image d-flex justify-content-center align-items-center">
        

            @if (request()->is('about'))
            <div class="hero_text text-center text-white">
                <h1 class="text-bold"> About Me</h1>
                <p>This is what i do.</p>
            </div>
            @elseif(request()->is('home'))
            <div class="hero_text text-center text-white">
                <h1 class="text-bold">Clean Blog</h1>
                <p>A Blog Theme By Start Bootstrap</p>
            </div>
            @elseif(request()->is('post'))
            <div class="hero_text text-left text-white w-50 mx-auto">
                <h1 class="text-bold pb-3">Man must explore, and this is exploration at its greatest</h1>
                <h2 class="text-bold" style="color: rgb(189, 189, 189)">Problems look mighty small from 150 miles up
                </h2>
                <p class="text-bold" style="color: rgb(189, 189, 189)">Posted by Start Bootstrap on August 24, 2018</p>
            </div>
            @elseif(request()->is('contact'))
            <div class="hero_text text-center text-white">
                <h1 class="text-bold">Contact me</h1>
                <p>Have questions? I have answers!</p>
            </div>
            @endif
        
    </div>
</header>
