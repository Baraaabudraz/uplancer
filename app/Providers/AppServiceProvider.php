<?php

namespace App\Providers;
use Illuminate\Support\Facades\Schema;
use Spatie\Export\Exporter;
use Illuminate\Support\ServiceProvider;

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
    public function boot(Exporter $exporter)
    {
        Schema::defaultStringLength(191);

        //
//        $exporter->crawl(false);
//
//        $exporter->paths(['index']);
//        $exporter->paths(Post::all()->pluck('slug'));
    }
}
