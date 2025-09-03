<?php

namespace SamoSadlaker\StatamicLangtag;

use Statamic\Providers\AddonServiceProvider;

class ServiceProvider extends AddonServiceProvider
{

    protected $tags = [

    ];

    protected $routes = [
        'web' => __DIR__ . '/../routes/langtag.php',
    ];

    public function bootAddon()
    {
        parent::boot();
        $this->mergeConfigFrom(__DIR__ . '/../config/langtag.php', 'statamic.langtag');
        $this->publishes([
            __DIR__ . '/../config/langtag.php' => config_path('statamic/langtag.php'),
        ], 'statamic-langtag');
    }
}
