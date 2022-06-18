<div class="card mb-3  d-flex justify-content-center" style="max-width: 540px;">
  <div class="row g-0">
    <div class="col-md-4 align-self-center d-flex justify-content-center">
      <img src="{{ URL::to('/') }}/img/macbook.webp" class="img-fluid rounded-start" alt="...">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title">{{$product->name}}</h5>
        <p class="card-text">{{$product->category->name}}</p>
        <p class="card-text">{{\Illuminate\Support\Str::words($product->description, 25, '...')}}</p>
        @if ($type == 'discount')
            <p class="card-text price"><s>{{$product->price}} ₴</s> <span>1590 ₴</span></p>
        @else
            <p class="card-text price">{{$product->price}} ₴</p>
        @endif
        <form action="{{route('basket-add', $product)}}" method="POST">
          <button type="submit" class="btn btn-dark">Додати у кошик</button>
          <a class="btn btn-secondary" href="{{route('product', $product->code)}}" role="button" aria-disabled="true">Переглянути</a>
          @csrf
        </form>
      </div>
    </div>
  </div>
</div>