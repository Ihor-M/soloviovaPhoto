<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ViewComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('partials.header', function ($view)
        {
            // Instantiate new DOMDocument object
            $svg = new \DOMDocument();
            // Load SVG file from public folder
            $svg->load(public_path('images/logoOptimised.svg'));
            // Add CSS class
            $svg->documentElement->setAttribute("class", "logo");
            // Get XML without version element
            $logo = $svg->saveXML($svg->documentElement);
            // Attach data to view
            $view->with('logo', $logo);
        });
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
