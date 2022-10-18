@extends('layouts.adminLayout')
@isset($category)
    @section('title')Панель адміністратора(Редагувати товар) - MyDevice.ua @endsection
@else
    @section('title')Панель адміністратора(Створити товар) - MyDevice.ua @endsection
@endisset


@section('main_content')

<section class="category">
    <div class="container">
        <h1 class="text-center">
            @isset($product)
                Редагувати товар - {{$product->name}}
            @else
                Створити товар
            @endisset
        </h1>
        <form action="
            @isset($product)
                {{route('products.update', $product)}}
            @else
                {{route('products.store')}}
            @endisset
        " method="POST" enctype="multipart/form-data">
            @isset($product)@method('PUT')@endisset
            @csrf
            @include('layouts.error', ['fieldname' => 'name'])
            <div class="input-group flex-nowrap">
                <span class="input-group-text" id="addon-wrapping">Назва товару</span>
                <input type="name" class="form-control" name="name" placeholder="Телефон" value="{{old('name', isset($product) ? $product->name : null)}}" aria-describedby="addon-wrapping">
            </div>
            @include('layouts.error', ['fieldname' => 'name_eng'])
            <div class="input-group flex-nowrap">
                <span class="input-group-text" id="addon-wrapping">Назва категорії англійською</span>
                <input type="name" class="form-control" name="name_eng" placeholder="Телефони" value="{{old('name_eng', isset($product) ? $product->name_eng : null)}}" aria-describedby="addon-wrapping">
            </div>
            @include('layouts.error', ['fieldname' => 'code'])
            <div class="input-group flex-nowrap">
                <span class="input-group-text" id="addon-wrapping">Код</span>
                <input type="code" class="form-control" name="code" placeholder="phone" value="{{old('code', isset($product) ? $product->code : null)}}" aria-describedby="addon-wrapping">
            </div>
            <select class="form-select" name="category_id">
                @foreach($categories as $category)
                <option value="{{$category->id}}" @isset($product)@if($product->category_id == $category->id)selected @endif @endisset>{{$category->name}}</option>
                @endforeach
            </select>
            @include('layouts.error', ['fieldname' => 'description'])
            <div class="input-group flex-nowrap">
                <span class="input-group-text">Опис</span>
                <textarea class="form-control" name="description">{{old('description', isset($product) ? $product->description : null)}}</textarea>
            </div>
            @include('layouts.error', ['fieldname' => 'description_eng'])
            <div class="input-group flex-nowrap">
                <span class="input-group-text" id="addon-wrapping">Опис категорії англійською</span>
                <textarea class="form-control" name="description_eng">{{old('description_eng', isset($product) ? $product->description_eng : null)}}</textarea>
            </div>
            @include('layouts.error', ['fieldname' => 'image'])
            <div class="mb-3">
                <input class="form-control" type="file" name="image" id="formFile">
            </div>
            @foreach(['hit' => 'Хіт продажу', 'new' => 'Новий товар', 'recommend' => 'Рекомендовано'] as $field => $title)
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="{{$field}}"
                        @if(isset($product) && $product->$field === 1)
                            checked = "checked"
                        @endif>
                <label class="form-check-label" for="flexCheckDefault">
                    {{$title}}
                </label>
            </div>
            @endforeach
            @include('layouts.error', ['fieldname' => 'price'])
            <div class="input-group flex-nowrap">
                <span class="input-group-text" id="addon-wrapping">Ціна</span>
                <input type="code" class="form-control" name="price" value="{{old('price', isset($product) ? $product->price : null)}}" aria-describedby="addon-wrapping">
            </div>

            @include('layouts.error', ['fieldname' => 'count'])
            <div class="input-group flex-nowrap">
                <span class="input-group-text" id="addon-wrapping">Кількість</span>
                <input type="code" class="form-control" name="count" value="{{old('count', isset($product) ? $product->count : null)}}" aria-describedby="addon-wrapping">
            </div>
            <button type="submit" class="btn btn-primary">Зберегти</button>
        </form>        
    </div>
</section>

@endsection
