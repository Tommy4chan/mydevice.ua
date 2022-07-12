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
            @error('name')
                <div class="alert alert-warning alert-dismissible fade show" role="alert" style="margin-top: 75px;">
                    {{$message}}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @enderror
            <div class="input-group flex-nowrap">
                <span class="input-group-text" id="addon-wrapping">Назва категорії</span>
                <input type="name" class="form-control" name="name" placeholder="Телефони" value="{{old('name', isset($category) ? $category->name : null)}}" aria-describedby="addon-wrapping">
            </div>
            @error('code')
                <div class="alert alert-warning alert-dismissible fade show" role="alert" style="margin-top: 75px;">
                    {{$message}}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @enderror
            <div class="input-group flex-nowrap">
                <span class="input-group-text" id="addon-wrapping">Код</span>
                <input type="code" class="form-control" name="code" placeholder="phones" value="{{old('code', isset($category) ? $category->code : null)}}" aria-describedby="addon-wrapping">
            </div>
            @error('description')
                <div class="alert alert-warning alert-dismissible fade show" role="alert" style="margin-top: 75px;">
                    {{$message}}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @enderror
            <div class="input-group flex-nowrap">
                <span class="input-group-text">Опис</span>
                <textarea class="form-control" name="description">{{old('description', isset($category) ? $category->description : null)}}</textarea>
            </div>
            @error('image')
                <div class="alert alert-warning alert-dismissible fade show" role="alert" style="margin-top: 75px;">
                    {{$message}}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @enderror
            <div class="mb-3">
                <input class="form-control" type="file" name="image" id="formFile">
            </div>
            <button type="submit" class="btn btn-primary">Зберегти</button>
        </form>        
    </div>
</section>

@endsection
