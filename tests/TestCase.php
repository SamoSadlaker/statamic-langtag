<?php

namespace SamoSadlaker\StatamicLangtag\Tests;

use SamoSadlaker\StatamicLangtag\ServiceProvider;
use Statamic\Testing\AddonTestCase;

abstract class TestCase extends AddonTestCase
{
    protected string $addonServiceProvider = ServiceProvider::class;
}
