@extends('layouts.defaultLayout')

@section('title'){{$category->name}} - MyDevice.ua @endsection

@section('main_content')


<section class="category">
    <div class="container">
        <img src="{{Storage::url($category->image)}}" class="w-50">
        <h1 class="text-center">{{$category->__('name')}}</h1>
        <h2 class="text-center">{{$category->__('description')}}</h2>
        @include('layouts.filter')
        <div class="row" style="margin-top: 40px;">
            @foreach($category->products as $product)
                <div class="col-lg-6 d-flex justify-content-center">
                    @include('layouts.productCard', compact('product'), ['type' => 'normal'])
                </div>
            @endforeach
        </div>
    </div>
    {{$category->products->links()}}
</section>

@endsection
