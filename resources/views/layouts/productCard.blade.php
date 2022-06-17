<div class="card mb-3" style="max-width: 540px;">
  <div class="row g-0">
    <div class="col-md-4 align-self-center d-flex justify-content-center">
      <img src="img/macbook.webp" class="img-fluid rounded-start" alt="...">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title">Card title</h5>
        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
        @if ($type == 'discount')
            <p class="card-text price"><s>1990 ₴</s> <span>1590 ₴</span></p>
        @else
            <p class="card-text price">1990 ₴</p>
        @endif
        <button type="button" class="btn btn-dark">Додати у кошик</button>
        <a class="btn btn-secondary" role="button" aria-disabled="true">Переглянути</a>
      </div>
    </div>
  </div>
</div>