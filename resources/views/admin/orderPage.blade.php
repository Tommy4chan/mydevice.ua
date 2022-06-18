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
                            {{$order->getFullSum()}} ₴
                        </td>
                        <td>
                            <form action="" method="POST">
                                <button type="submit" class="btn btn-success">Більше</button>
                                @csrf
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <a class="btn btn-secondary" href="{{route('basket-place')}}" role="button" aria-disabled="true">Підтвердити замовлення</a>
    </div>
</section>

@endsection
