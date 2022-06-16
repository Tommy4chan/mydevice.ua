@extends('layouts.defaultLayout')

@section('title')Головна сторінка - MyDevice.ua @endsection

@section('main_content')

<header>
    <div class="container">
        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="true">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                <img src="img/1.webp" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                <img src="img/2.webp" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                <img src="img/3.webp" class="d-block w-100" alt="...">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>

</header>

<section class="popular-products">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 d-flex justify-content-center">
            @include('layouts.productCard', ['type' => 'discount'])
            </div>
            <div class="col-lg-6 d-flex justify-content-center">
                @include('layouts.productCard')
            </div>
        </div>
    </div>
</section>

@endsection
