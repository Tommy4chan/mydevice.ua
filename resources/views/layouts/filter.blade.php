
<form method="GET" action="{{route('category', $category->code)}}">
    <div class="row">
        <div class="col">
            <div class="input-group mb-3">
                <input type="text" name="price_from" class="form-control" placeholder="0" value="{{request()->price_from}}">
                <span class="input-group-text">-</span>
                <input type="text" name="price_to" class="form-control" placeholder="99999" value="{{request()->price_to}}">
            </div>
        </div>
        <div class="col">
            <div class="form-check">
                <input class="form-check-input" name="hit" type="checkbox" id="flexCheckDefault" @if(request()->has('hit')) checked @endif>
                <label class="form-check-label" for="flexCheckDefault">
                    Хіт продаж
                </label>
            </div>
        </div>
        <div class="col">
            <div class="form-check">
                <input class="form-check-input" name="new" type="checkbox" id="flexCheckDefault" @if(request()->has('new')) checked @endif>
                <label class="form-check-label" for="flexCheckDefault">
                    Новий продукт
                </label>
            </div>
        </div>
        <div class="col">
            <div class="form-check">
                <input class="form-check-input" name="recommend" type="checkbox" id="flexCheckDefault" @if(request()->has('recommend')) checked @endif>
                <label class="form-check-label" for="flexCheckDefault">
                    @lang('main.filter.recommend')
                </label>
            </div>
        </div>
        <div class="col">
            <button type="submit" class="btn btn-success">Фільтр</button>
        </div>
        <div class="col">
            <a href="{{route('category', $category->code)}}" class="btn btn-danger">Скинути</a>
        </div>
    </div>
</form>
