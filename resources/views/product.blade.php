@extends('layouts.defaultLayout')

@section('title'){{$product->name}} - MyDevice.ua @endsection

@section('main_content')

<section class="product">
    <div class="container">
        <h1 class="text-center">{{$product->__('name')}}</h1>
        <div class="row">
            <div class="col-lg-4 align-self-center">
                <img src="{{Storage::url($product->image)}}" class="w-100">
            </div>
            <div class="col-lg-8 align-self-center">
            @if($product->isNew())
                <span class="badge text-bg-success">Новий продукт</span>
            @endif
            @if($product->isRecommend())
                <span class="badge text-bg-danger">Рекомендовано</span>
            @endif
            @if($product->isHit())
                <span class="badge text-bg-warning">Хіт продаж!</span>
            @endif
                <h2>Опис</h2>
                <p>
                    {{$product->__('description')}}
                </p>
                <h2>Характеристики</h2>
                <p>
                    Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sint et ipsa fugit? Commodi dolorum impedit 
                    laudantium voluptas ex in, aspernatur aut esse quos ipsa sunt reiciendis illo nisi pariatur perferendis.
                </p>
                <h3>Ціна: {{$product->price}} ₴</h3>
                <h3>Кількість: {{$product->count}} шт.</h3>
                @if($product->isAvailable())
                    <form action="{{route('basket-add', $product)}}" method="POST">       
                            <button type="submit" class="btn btn-dark">Додати у кошик</button>
                        @csrf
                    </form>
                @else
                    <form action="{{route('subscription', $product)}}" method="POST">
                        @csrf
                        @guest
                            @include('layouts.error', ['fieldname' => 'email'])
                            <div class="input-group flex-nowrap">
                                <span class="input-group-text" id="addon-wrapping">Email</span>
                                <input class="form-control" name="email" placeholder="example@domain.com" aria-describedby="addon-wrapping">
                            </div>
                        @endguest
                        <button type="submit" class="btn btn-dark">Сповістити коли товар буде в наявності</button>
                    </form>
                    <a class="btn btn-danger">Нема в наявності</a>
                @endif
            </div>
        </div>
    </div>
</section>

@endsection
