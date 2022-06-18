@extends('layouts.adminLayout')
@isset($category)
    @section('title')Панель адміністратора(Редагувати категорію) - MyDevice.ua @endsection
@else
    @section('title')Панель адміністратора(Створити категорію) - MyDevice.ua @endsection
@endisset


@section('main_content')

<section class="category">
    <div class="container">
        <h1 class="text-center">
            @isset($category)
                Редагувати категорію - {{$category->name}}
            @else
                Створити категорію
            @endisset
        </h1>
        <form action="
            @isset($category)
                {{route('categories.update', $category)}}
            @else
                {{route('categories.store')}}
            @endisset
        " method="POST">
            @isset($category)@method('PUT')@endisset
            @csrf
            <div class="input-group flex-nowrap">
                <span class="input-group-text" id="addon-wrapping">Назва категорії</span>
                <input type="name" class="form-control" name="name" placeholder="Телефони" value="@isset($category){{$category->name}}@endisset" aria-describedby="addon-wrapping">
            </div>
            <div class="input-group flex-nowrap">
                <span class="input-group-text" id="addon-wrapping">Код</span>
                <input type="code" class="form-control" name="code" placeholder="phones" value="@isset($category){{$category->code}}@endisset" aria-describedby="addon-wrapping">
            </div>
            <div class="input-group flex-nowrap">
                <span class="input-group-text">Опис</span>
                <textarea class="form-control" name="description" aria-label="With textarea">@isset($category){{$category->description}}@endisset</textarea>
            </div>
            <div class="mb-3">
                <input class="form-control" type="file" name="photo" id="formFile">
            </div>
            <button type="submit" class="btn btn-primary">Зберегти</button>
        </form>        
    </div>
</section>

@endsection
