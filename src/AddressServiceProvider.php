<?php

namespace RiseTech\Address;

use Illuminate\Support\Facades\Event;
use Illuminate\Support\ServiceProvider;

use RiseTech\Address\Events\Address\AddressCreateOrUpdateBillingEvent;
use RiseTech\Address\Events\Address\AddressCreateOrUpdateDefaultEvent;
use RiseTech\Address\Events\Address\AddressCreateOrUpdateDeliveryEvent;
use RiseTech\Address\Listeners;

class AddressServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot(): void
    {
        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');

        Event::listen(AddressCreateOrUpdateDefaultEvent::class, Listeners\AddressCreateOrUpdateDefaultListener::class);
        Event::listen(AddressCreateOrUpdateDeliveryEvent::class, Listeners\AddressCreateOrUpdateDeliveryListener::class);
        Event::listen(AddressCreateOrUpdateBillingEvent::class, Listeners\AddressCreateOrUpdateBillingListener::class);
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
