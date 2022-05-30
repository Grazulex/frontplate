<?php

namespace App\Providers;

use App\Models\Cash;
use App\Models\Close;
use App\Observers\CashObserver;
use App\Observers\CloseObserver;
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
    public function boot()
    {
        Cash::observe(CashObserver::class);
    }
}
