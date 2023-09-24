<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(CosplayRepositoryInterface::class, CosplayEloquentORM::class);
        $this->app->bind(VoteRepositoryInteface::class, VoteEloquentORM::class);
        $this->app->bind(HQReposistoryInterface::class, HQEloquentORM::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
