<?php

namespace App\Providers;

use App\Interfaces\VendorInterface;
use App\Interfaces\StaffInterface;


use App\Repositories\VendorRepository;
use App\Repositories\StaffRepository;



use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(VendorInterface::class, VendorRepository::class);
        $this->app->bind(StaffInterface::class, StaffRepository::class);
        
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
