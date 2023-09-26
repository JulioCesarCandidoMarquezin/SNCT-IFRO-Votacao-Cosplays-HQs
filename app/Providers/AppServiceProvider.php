<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\Cosplay\CosplayEloquentORM;
use App\Repositories\Cosplay\CosplayRepositoryInterface;
use App\Repositories\Hq\HQEloquentORM;
use App\Repositories\Hq\HQRepositoryInterface;
use App\Repositories\Vote\VoteEloquentORM;
use App\Repositories\Vote\VoteRepositoryInterface;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(CosplayRepositoryInterface::class, CosplayEloquentORM::class);
        $this->app->bind(VoteRepositoryInterface::class, VoteEloquentORM::class);
        $this->app->bind(HQRepositoryInterface::class, HQEloquentORM::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
