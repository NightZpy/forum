<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        /*\View::composer('*', function ($view) {
            $view->with('channels', \App\Channel::all())
                 ->with('filteredChannels', \App\Channel::with('threads')->has('threads')->get());
        });*/

        \View::share([
                'channels'=> \App\Channel::all(),
                'filteredChannels' => \App\Channel::with('threads')->has('threads')->get()     
            ]);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        if ($this->app->environment() !== 'production') {
            $this->app->register(\Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider::class);
        }
    }
}
