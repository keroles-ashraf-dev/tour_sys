<?php

namespace App\Providers;

use App\Repositories\Booking\BookingRepository;
use App\Repositories\Booking\BookingRepositoryInterface;
use App\Repositories\Client\ClientRepository;
use App\Repositories\Client\ClientRepositoryInterface;
use Illuminate\Support\ServiceProvider;
use App\Repositories\Tour\TourRepository;
use App\Repositories\Tour\TourRepositoryInterface;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            TourRepositoryInterface::class,
            TourRepository::class
        );

        $this->app->bind(
            BookingRepositoryInterface::class,
            BookingRepository::class
        );

        $this->app->bind(
            ClientRepositoryInterface::class,
            ClientRepository::class
        );
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
