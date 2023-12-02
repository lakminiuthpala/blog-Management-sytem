<?php

namespace App\Providers;

use App\Interfaces\DeviceRepositoryInterface;
use App\Interfaces\LocationRepositoryInterface;
use App\Interfaces\OrganizationRepositoryInterface;
use App\Repositories\DeviceRepository;
use App\Repositories\LocationRepository;
use App\Repositories\OrganizationRepository;
use App\Interfaces\BlogRepositoryInterface;
use App\Repositories\BlogRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(OrganizationRepositoryInterface::class,OrganizationRepository::class);
        $this->app->bind(LocationRepositoryInterface::class,LocationRepository::class);
        $this->app->bind(DeviceRepositoryInterface::class,DeviceRepository::class);
        $this->app->bind(BlogRepositoryInterface::class, BlogRepository::class);

    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
