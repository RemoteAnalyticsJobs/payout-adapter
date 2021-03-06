<?php
namespace PayoutAdapter;


use Illuminate\Support\ServiceProvider;

class PayoutAdapterServiceProvider extends ServiceProvider
{

    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/Config/PayoutAdapter.php', 'payout_adapter');
        $this->loadMigrationsFrom(__DIR__ . '/Database/migrations/');
    }

    public function boot()
    {
    }

}
