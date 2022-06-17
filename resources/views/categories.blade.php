@extends('layouts.defaultLayout')

@section('title')Телефони - MyDevice.ua @endsection

@section('main_content')

<section class="category">
    <div class="container">
        <h1 class="text-center">Телефони</h1>
        <div class="row" style="margin-top: 40px;">
            <div class="col-lg-6 d-flex justify-content-center">
                @include('layouts.productCard', ['type' => 'normal'])
            </div>
            <div class="col-lg-6 d-flex justify-content-center">
                @include('layouts.productCard', ['type' => 'normal'])
            </div>
        </div>
    </div>
</section>

@endsection
