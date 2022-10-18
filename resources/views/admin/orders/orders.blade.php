@extends('layouts.adminLayout')

@section('title')Панель адміністратора - MyDevice.ua @endsection

@section('main_content')

<section class="category">
    <div class="container">
        <table class="table table-striped">
            <thead>
            <tr>
                <th>Номер замовлення</th>
                <th>ПІБ</th>
                <th>Телефон</th>
                <th>Дата відправки</th>
                <th>Сума</th>
                <th>Дії</th>
            </tr>
            </thead>
            <tbody>
                @foreach($orders as $order)
                    <tr>
                        <td>
                            {{$order->id}}
                        </td>
                        <td>
                            {{$order->name}}
                        </td>
                        <td>
                            {{$order->phone}}
                        </td>
                        <td>
                            {{$order->updated_at->format('H:i d/m/y')}}
                        </td>
                        <td>
                            {{ $order->calculateFullSum() }} ₴
                        </td>
                        <td>
                            <a class="btn btn-success" href="
                            @admin
                                {{route('orders.show', $order)}}
                            @else
                                {{route('user.orders.show', $order)}}
                            @endadmin
                            " role="button" aria-disabled="true">Більше</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</section>

@endsection
