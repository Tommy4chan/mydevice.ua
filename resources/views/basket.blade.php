@extends('layouts.defaultLayout')

@section('title')Корзина - MyDevice.ua @endsection

@section('main_content')

<section class="category">
    <div class="container">
        <table class="table table-striped">
            <thead>
            <tr>
                <th>Назва</th>
                <th>Кількість</th>
                <th>Ціна</th>
                <th>Вартість</th>
            </tr>
            </thead>
            <tbody>
                @foreach($order->products as $product)
                    <tr>
                        <td>
                            <a href="{{route('product', $product->code)}}">
                                <img height="56px" src="{{Storage::url($product->image)}}">
                                {{ $product->name }}
                            </a>
                        </td>
                        <td><span class="badge">{{ $product->pivot->count }}</span>
                            <div class="btn-group form-inline">
                                <form action="{{route('basket-remove', $product)}}" method="POST">
                                    <button type="submit" class="btn btn-danger" href="">-</button>
                                    @csrf
                                </form>
                                <form action="{{route('basket-add', $product)}}" method="POST">
                                    <button type="submit" class="btn btn-success"
                                            href="">+</button>
                                    @csrf
                                </form>
                            </div>
                        </td>
                        <td>{{$product->price}} ₴</td>
                        <td>{{$product->getPriceForCount()}} ₴</td>
                    </tr>
                @endforeach
                <tr>
                    <td colspan="3">Сума:</td>
                    <td>{{ $order->getFullSum() }} ₴</td>
                </tr>
            </tbody>
        </table>
        <a class="btn btn-secondary" href="{{route('basket-place')}}" role="button" aria-disabled="true">Підтвердити замовлення</a>
    </div>
</section>

@endsection
