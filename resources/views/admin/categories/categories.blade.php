@extends('layouts.adminLayout')

@section('title')Панель адміністратора - MyDevice.ua @endsection

@section('main_content')

<section class="category">
    <div class="container">
        <table class="table table-striped">
            <thead>
            <tr>
                <th>Номер категорії</th>
                <th>Код</th>
                <th>Назва</th>
                <th>Дії</th>
            </tr>
            </thead>
            <tbody>
                @foreach($categories as $category)
                    <tr>
                        <td>
                            {{$category->id}}
                        </td>
                        <td>
                            {{$category->code}}
                        </td>
                        <td>
                            {{$category->name}}
                        </td>
                        <td>
                            <div class="btn-group form-inline">
                                <a class="btn btn-success" href="{{route('categories.show', $category)}}" role="button" aria-disabled="true">Відкрити</a>
                                <a class="btn btn-warning" href="{{route('categories.edit', $category)}}" role="button" aria-disabled="true">Редагувати</a>
                                <form action="{{route('categories.destroy', $category)}}" method="POST">
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
        <a class="btn btn-success" href="{{route('categories.create')}}" role="button" aria-disabled="true">Створити категорію</a>
    </div>
</section>

@endsection
