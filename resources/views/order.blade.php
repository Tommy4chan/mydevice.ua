@extends('layouts.defaultLayout')

@section('title')Оформити замовлення - MyDevice.ua @endsection

@section('main_content')

<section class="category">
    <div class="container">
        <h1 class="text-center">Підтвердіть ваше замовлення</h1>
        <h2 class="text-center">Сума замовлення: {{$order->calculateFullSum()}} ₴</h2>
        <form action="{{route('basket-confirm')}}" method="POST">
            @csrf
            <div class="input-group flex-nowrap">
                <span class="input-group-text" id="addon-wrapping">ПІБ</span>
                <input type="name" class="form-control" name="name" placeholder="Іваненко Іван Іванович" aria-describedby="addon-wrapping">
            </div>
            <div class="input-group flex-nowrap">
                <span class="input-group-text" id="addon-wrapping">Номер телефону</span>
                <input type="phone" class="form-control" name="phone" placeholder="+380" aria-describedby="addon-wrapping">
            </div>
            @guest
            <div class="input-group flex-nowrap">
                <span class="input-group-text" id="addon-wrapping">Email</span>
                <input type="phone" class="form-control" name="email" placeholder="example@domain.com" aria-describedby="addon-wrapping">
            </div>
            @endguest
            <button type="submit" class="btn btn-primary">Підтвердити замовлення</button>
        </form>
    </div>
</section>

@endsection
