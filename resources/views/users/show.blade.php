<!DOCTYPE html>
<html>

<head>
    <title>Document</title>
    <meta charset="utf-8" />
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <meta name="viewport" content="width=device-width,initial-scale=1.0" />

    <!-- Latest compiled and minified Bootstrap 4.6 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <!-- CSS script -->
    <link rel="stylesheet" href="style.css">
    <!-- Latest Font-Awesome CDN -->
    <script src="https://kit.fontawesome.com/0e37b883f4.js" crossorigin="anonymous"></script>
</head>

<body
    style="background-image: url('https://images.photowall.com/products/49771/coffee-beans.jpg?h=699&q=85');
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;">

    <h1 class="text-white w-50 mx-auto pt-5 text-center" style="font-size: 60px">BUSINESS CASUAL</h1>
    <div class="nav pt-3">
        <ul class=" w-100 d-flex justify-content-center py-3 mt-5"
            style="list-style: none; background-color:rgb(104, 53, 17);">
            <li><a href="{{ route('user') }}" class="text-white mr-5"
                    style="text-decoration: none; font-size: 25px;">HOME</a></li>
            @if (session()->has('user_data'))
                <li><a href="{{ route('user.logout') }}" class="text-white"
                        style="text-decoration: none; font-size: 25px;">LOG OUT</a></li>
            @else
                <li><a href="{{ route('user.create') }}" class="text-white mr-5"
                        style="text-decoration: none; font-size: 25px;">LOG IN</a></li>
            @endif
        </ul>
    </div>
    
    <div class="container-fluid py-5 my-5">
        <div class="row">
            <div class="col-6 offset-1">
                <div class=" text-white p-4 m-2">
                    <h4 class="text-uppercase my-3"> Your Name is : {{ $userData['name'] }}</h4>
                    <h4 class="text-uppercase my-3">Your Last Name is : {{ $userData['lastname'] }}</h4>
                    @isset($userData['email'])
                    <h4 class="text-uppercase my-3">Your Email is : {{ $userData['email'] }}</h4>
                @endisset
                </div>
            </div>
        </div>
    </div>
    <div class="footer py-3 d-flex justify-content-center"
        style="background-color:rgb(104, 53, 17); position: fixed;
        left: 0;
        bottom: 0;
        width: 100%;">
        <p class="text-white m-0 ">Copyright @ My website 2023</p>
    </div>
    <!-- jQuery library -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="ha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>

    <!-- Latest Compiled Bootstrap 4.6 JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js"
        integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous">
    </script>
</body>

</html>
