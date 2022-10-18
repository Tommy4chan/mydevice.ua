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
        " method="POST" enctype="multipart/form-data">
            @isset($category)@method('PUT')@endisset
            @csrf
            @include('layouts.error', ['fieldname' => 'name'])
            <div class="input-group flex-nowrap">
                <span class="input-group-text" id="addon-wrapping">Назва категорії</span>
                <input type="name" class="form-control" name="name" placeholder="Телефони" value="{{old('name', isset($category) ? $category->name : null)}}" aria-describedby="addon-wrapping">
            </div>
            @include('layouts.error', ['fieldname' => 'name_eng'])
            <div class="input-group flex-nowrap">
                <span class="input-group-text" id="addon-wrapping">Назва категорії англійською</span>
                <input type="name" class="form-control" name="name_eng" placeholder="Телефони" value="{{old('name_eng', isset($category) ? $category->name_eng : null)}}" aria-describedby="addon-wrapping">
            </div>
            @include('layouts.error', ['fieldname' => 'code'])
            <div class="input-group flex-nowrap">
                <span class="input-group-text" id="addon-wrapping">Код</span>
                <input type="code" class="form-control" name="code" placeholder="phones" value="{{old('code', isset($category) ? $category->code : null)}}" aria-describedby="addon-wrapping">
            </div>
            @include('layouts.error', ['fieldname' => 'description'])
            <div class="input-group flex-nowrap">
                <span class="input-group-text">Опис</span>
                <textarea class="form-control" name="description">{{old('description', isset($category) ? $category->description : null)}}</textarea>
            </div>
            @include('layouts.error', ['fieldname' => 'description_eng'])
            <div class="input-group flex-nowrap">
                <span class="input-group-text" id="addon-wrapping">Опис категорії англійською</span>
                <textarea class="form-control" name="description_eng">{{old('description_eng', isset($category) ? $category->description_eng : null)}}</textarea>
            </div>
            @include('layouts.error', ['fieldname' => 'image'])
            <div class="mb-3">
                <input class="form-control" type="file" name="image" id="formFile">
            </div>
            <button type="submit" class="btn btn-primary">Зберегти</button>
        </form>        
    </div>
</section>

@endsection
