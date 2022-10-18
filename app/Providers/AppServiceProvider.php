<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Category;
use App\Observers\ProductObserver;
use App\Product;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Blade;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Blade::directive('routeactive', function($route){
            return "<?php echo Route::currentRouteNamed($route) ?  'active' : '' ?>";
        });

        Blade::directive('language', function($language){
            return "<?php echo ($language == session('language')) ?  'active' : '' ?>";
        });

        Blade::if('admin', function(){
            return Auth::check() && Auth::user()->isAdmin();
        });

        View::composer('*', function($view)
        {
            $categoriesList = Category::all();
            $view->with('categoriesList', $categoriesList);
        });

        Collection::macro('paginate', function($perPage, $total = null, $page = null, $pageName = 'page') {
            $page = $page ?: LengthAwarePaginator::resolveCurrentPage($pageName);

            return new LengthAwarePaginator(
                $this->forPage($page, $perPage),
                $total ?: $this->count(),
                $perPage,
                $page,
                [
                    'path' => LengthAwarePaginator::resolveCurrentPath(),
                    'pageName' => $pageName,
                ]
            );
        });

        Product::observe(ProductObserver::class);
    }
}
