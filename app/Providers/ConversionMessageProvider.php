<?php namespace Cfair\Providers;

use Illuminate\Support\ServiceProvider;

class ConversionMessageProvider extends ServiceProvider
{

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {

        $this->app->bind(
            'Cfair\Interfaces\ConversionMessageInterface',
            'Cfair\Repositories\ConversionMessageRepository'
        );
    }

}
