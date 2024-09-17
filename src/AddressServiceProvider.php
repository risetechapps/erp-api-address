<?php

namespace RiseTech\Address;

use Illuminate\Support\Facades\Event;
use Illuminate\Support\ServiceProvider;
use RiseTech\Address\Events\Address\AddressCreateOrUpdateEvent;
use RiseTech\Address\Listeners\AddressCreateOrUpdateListener;

class AddressServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot(): void
    {
        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');

        Event::listen(AddressCreateOrUpdateEvent::class, AddressCreateOrUpdateListener::class);
    }

    /**
     * Register the application services.
     */
    public function register(): void
    {
        // Register the main class to use with the facade
        $this->app->singleton('address', function () {
            return new Address;
        });
    }
}
