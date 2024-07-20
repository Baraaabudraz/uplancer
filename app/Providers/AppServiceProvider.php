<?php

namespace App\Providers;
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
        //
//        $exporter->crawl(false);
//
//        $exporter->paths(['index']);
//        $exporter->paths(Post::all()->pluck('slug'));
    }
}
