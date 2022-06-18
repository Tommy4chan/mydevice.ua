@extends('layouts.defaultLayout')

@section('title'){{$category->name}} - MyDevice.ua @endsection

@section('main_content')

<section class="category">
    <div class="container">
        <h1 class="text-center">{{$category->name}}</h1>
        <h2 class="text-center">{{$category->description}}</h2>
        <div class="row" style="margin-top: 40px;">
            @foreach($category->products as $product)
                <div class="col-lg-6 d-flex justify-content-center">
                    @include('layouts.productCard', compact('product'), ['type' => 'normal'])
                </div>
            @endforeach
        </div>
    </div>
</section>

@endsection
