<doctype html>
<html lang="en">

<head>
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title') | Cuisine Connect</title>
    <link rel="icon" href="{{asset('images/logo.png')}}">
</head>

<body>
<div class="navbar">
    <a href="{{route('welcome')}}"><img src="https://thumbs.dreamstime.com/b/spikelet-grain-crop-wheat-rye-rice-spikelet-grain-crop-wheat-rye-rice-vector-image-isolated-white-background-171488804.jpg" /></a>
    <ul>
        {{--@if(auth()->user()->type == 'Customer')
            <li><a href="{{route('Customer.viewcart',['customer', auth()->user()])}}">Cart</a></li>
        @endif--}}
        @guest
            <li><a class="{{ (request()->is('login')) ? 'active' : '' }}" href="{{ route('login') }}">Login</a></li>
            <li><a class="{{ (request()->is('register')) ? 'active' : '' }}" href="{{ route('register') }}">Register</a>
            </li>
        @else
            <li><a class="dropdown-item" href="#"
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </li>
            <li><a class="Username" href="{{ route(Auth::user()->type . '.dashboard') }}" >{{ Auth::user()->name }}</a></li>
        @endguest
    </ul>
</div>
<div class="content">
    @yield('content')
</div>
</body>

</html>
