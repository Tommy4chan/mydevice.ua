@extends('layouts.defaultLayout')

@section('title'){{$product->name}} - MyDevice.ua @endsection

@section('main_content')

<section class="product">
    <div class="container">
        <h1 class="text-center">{{$product->name}}</h1>
        <div class="row">
            <div class="col-lg-4 align-self-center">
                <img src="{{ URL::to('/') }}/img/macbook.webp" class="w-100">
            </div>
            <div class="col-lg-8 align-self-center">
                <h2>Опис</h2>
                <p>
                    {{$product->description}}
                </p>
                <h2>Характеристики</h2>
                <p>
                    Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sint et ipsa fugit? Commodi dolorum impedit 
                    laudantium voluptas ex in, aspernatur aut esse quos ipsa sunt reiciendis illo nisi pariatur perferendis.
                </p>
            </div>
        </div>
    </div>
</section>

@endsection
