@extends('layouts.adminLayout')

@section('title')Панель адміністратора - MyDevice.ua @endsection

@section('main_content')

<section class="category">
    <div class="container">
        <table class="table table-striped">
            <thead>
            <tr>
                <th>Номер</th>
                <th>Код</th>
                <th>Назва</th>
                <th>Категорія</th>
                <th>Ціна</th>
                <th>Кількість</th>
                <th>Дії</th>
            </tr>
            </thead>
            <tbody>
                @foreach($products as $product)
                    <tr>
                        <td>
                            {{$product->id}}
                        </td>
                        <td>
                            {{$product->code}}
                        </td>
                        <td>
                            {{$product->name}}
                        </td>
                        <td>
                            {{$product->category->name}}
                        </td>
                        <td>
                            {{$product->price}}₴
                        </td>
                        <td>
                            {{$product->count}} шт.
                        </td>
                        <td>
                            <div class="btn-group form-inline">
                                <a class="btn btn-success" href="{{route('product', $product->code)}}" role="button" aria-disabled="true">Відкрити</a>
                                <a class="btn btn-warning" href="{{route('products.edit', $product)}}" role="button" aria-disabled="true">Редагувати</a>
                                <form action="{{route('products.destroy', $product)}}" method="POST">
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Видалити</button>
                                    @csrf
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <a class="btn btn-success" href="{{route('products.create')}}" role="button" aria-disabled="true">Створити продукт</a>
    </div>
</section>

@endsection
