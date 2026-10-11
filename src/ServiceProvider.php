<?php

namespace SamoSadlaker\StatamicLangtag;

use SamoSadlaker\StatamicLangtag\Tags\LangTag;
use Statamic\Providers\AddonServiceProvider;

class ServiceProvider extends AddonServiceProvider
{
    protected $tags = [
        LangTag::class,
    ];

    protected $routes = [
        'web' => __DIR__ . '/../routes/langtag.php',
    ];

    public function register()
    {
        parent::register();

        $this->mergeConfigFrom(__DIR__ . '/../config/langtag.php', 'statamic.langtag');
    }

    public function bootAddon()
    {
        $this->publishes([
            __DIR__ . '/../config/langtag.php' => config_path('statamic/langtag.php'),
        ], 'statamic-langtag');
    }
}
