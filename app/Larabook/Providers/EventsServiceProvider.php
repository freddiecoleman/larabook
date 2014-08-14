<?php namespace Larabook\Providers;

use Illuminate\Support\ServiceProvider;

class EventsServiceProvider extends ServiceProvider {

    /**
     * Register Larabook event listeners.
     */
    public function register()
    {
        $this->app['events']->listen('Larabook.*', 'Larabook\Handlers\EmailNotifier');
    }

} 