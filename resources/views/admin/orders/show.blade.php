@extends('layouts.adminLayout')

@section('title')Панель адміністратора - MyDevice.ua @endsection

@section('main_content')

<section class="category">
    <div class="container">
        <h2>Замовлення {{$order->id}}</h2>
        <p>Замовник: {{$order->name}}</p>
        <p>Номер телефона: {{$order->phone}}</p>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Назва товару</th>
                    <th>Кількість</th>
                    <th>Ціна</th>
                    <th>Вартість</th>
                </tr>
            </thead>
            <tbody>
                @foreach($order->productsWithTrashed as $product)
                <tr>
                    <td>
                        {{$product->name}}
                    </td>
                    <td>
                        <span class="badge">{{ $product->pivot->count }}</span>
                    </td>
                    <td>
                        {{$product->price}} ₴
                    </td>
                    <td>
                        {{$product->getPriceForCount()}} ₴
                    </td>
                </tr>
                @endforeach
                <tr>
                    <td colspan="3">Сума:</td>
                    <td>{{ $order->calculateFullSum() }} ₴</td>
                </tr>
            </tbody>
        </table>
    </div>
</section>

@endsection