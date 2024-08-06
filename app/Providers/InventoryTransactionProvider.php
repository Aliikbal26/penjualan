<?php

namespace App\Providers;

use App\Services\Impl\InventoryTransactionServiceImpl;
use App\Services\InventoryTransactionService;
use Illuminate\Support\ServiceProvider;

class InventoryTransactionProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public array $singletons = [
        InventoryTransactionService::class => InventoryTransactionServiceImpl::class
    ];

    public function provides()
    {
        return [InventoryTransactionService::class];
    }


    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
