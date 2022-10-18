<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ URL::to('/') }}/css/style.css">
    <title>@lang('main.shop_name') @yield('title')</title>
</head>

<body>
    <nav class="navbar fixed-top navbar-expand-lg bg-light">
        <div class="container">
            <a class="navbar-brand" href="{{route('home')}}"><img src="/img/logo.png" alt="" width="35" height="35"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link @routeactive('home')" aria-current="page" href="{{route('home')}}">Головна сторінка</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @routeactive('hotprices')" href="{{route('hotprices')}}">Гарячі ціни</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Категорії
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            @foreach($categoriesList as $category)
                            <li><a class="dropdown-item {{ Request::url() == route('category', $category->code) ?  'active' : '' }}" href="{{route('category', $category->code)}}">{{$category->name}}</a></li>
                            @endforeach
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @routeactive('basket')" href="{{route('basket')}}">Корзина</a>
                    </li>
                    @guest
                        <li class="nav-item">
                            <a class="nav-link @routeactive('login')" href="{{route('login')}}">Увійти</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @routeactive('register')" href="{{route('register')}}">Зареєструватися</a>
                        </li>
                    @endguest
                    @auth
                        @admin
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('orders.index')}}">Мій Кабінет</a>
                        </li>
                        @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('user.orders.index')}}">Мій Кабінет</a>
                        </li>
                        @endadmin
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('get-logout')}}">Вийти</a>
                        </li>
                    @endauth
                    <li class="nav-item">
                        <a class="nav-link @language('ua')" href="{{route('changeLanguage', 'ua')}}">Ua</a>
                    </li>
                    
                    <li class="nav-item">
                        <a class="nav-link @language('eng')" href="{{route('changeLanguage', 'eng')}}">Eng</a>
                    </li>
                </ul>
                <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>
    @if(session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert" style="margin-top: 75px;">
            {{session()->get('success')}}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @elseif(session()->has('warning'))
        <div class="alert alert-warning alert-dismissible fade show" role="alert" style="margin-top: 75px;">
            {{session()->get('warning')}}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    @yield('main_content')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>