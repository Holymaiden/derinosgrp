<?php

namespace App\Providers;

use Carbon\Carbon;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        config(['app.locale' => 'id']);
        Carbon::setLocale('id');
        date_default_timezone_set('Asia/Makassar');

        // Initialize Model
        $models = array(
            'Blok',
            'Customer',
            'MasterPerumahan',
            'Perumahan',
            'User',
        );

        // Initialize Service
        foreach ($models as $model) {
            $this->app->bind("App\Services\Contracts\\{$model}Contract", "App\Services\\{$model}Service");
        }
    }
}
