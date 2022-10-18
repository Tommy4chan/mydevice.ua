@extends('layouts.adminLayout')

@section('title')Панель адміністратора - MyDevice.ua @endsection

@section('main_content')

<section class="category">
    <div class="container">
        <img src="{{Storage::url($category->image)}}" class="w-100">
        <h2>Назва: {{$category->name}} Id: {{$category->id}}</h2>
        <h3>Код: {{$category->code}}</h3>
        <h3>Опис: {{$category->description}}</h3>
        <h3>Кількість позицій: {{$category->products->count()}}</h3>
    </div>
</section>

@endsection
