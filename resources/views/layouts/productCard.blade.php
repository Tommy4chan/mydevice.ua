<div class="card mb-3  d-flex justify-content-center" style="max-width: 540px;">
  <div class="row g-0">
    <div class="col-md-4 align-self-center d-flex justify-content-center">
      <img src="{{Storage::url($product->image)}}" class="img-fluid rounded-start" alt="...">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        @if($product->isNew())
        <span class="badge text-bg-success">Новий продукт</span>
        @endif
        @if($product->isRecommend())
        <span class="badge text-bg-danger">Рекомендовано</span>
        @endif
        @if($product->isHit())
        <span class="badge text-bg-warning">Хіт продаж!</span>
        @endif
        <h5 class="card-title">{{$product->__('name')}}</h5>
        <p class="card-text">{{$product->category->__('name')}}</p>
        <p class="card-text">{{\Illuminate\Support\Str::words($product->description, 25, '...')}}</p>
        @if ($type == 'discount')
        <p class="card-text price"><s>{{$product->price}} ₴</s> <span>1590 ₴</span></p>
        @else
        <p class="card-text price">{{$product->price}} ₴</p>
        @endif
        <form action="{{route('basket-add', $product)}}" method="POST">
          @if($product->isAvailable())
          <button type="submit" class="btn btn-dark">Додати у кошик</button>
          @else
          <a class="btn btn-danger">Нема в наявності</a>
          @endif
          <a class="btn btn-secondary" href="{{route('product', $product->code)}}" role="button" aria-disabled="true">Переглянути</a>
          @csrf
        </form>
      </div>
    </div>
  </div>
</div>