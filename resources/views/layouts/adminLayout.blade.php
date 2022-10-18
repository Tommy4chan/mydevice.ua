<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ URL::to('/') }}/css/style.css">
    <title>@yield('title')</title>
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
                    @admin
                    <li class="nav-item">
                        <a class="nav-link @routeactive('orders*')" href="{{route('orders.index')}}">Замовлення</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @routeactive('categories*')" href="{{route('categories.index')}}">Категорії</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @routeactive('products*')" href="{{route('products.index')}}">Товари</a>
                    </li>
                    @endadmin
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('get-logout')}}">Вийти</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    @yield('main_content')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>