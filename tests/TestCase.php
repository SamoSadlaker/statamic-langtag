<?php

namespace Samosadlaker\StatamicLangtag\Tests;

use Samosadlaker\StatamicLangtag\ServiceProvider;
use Statamic\Testing\AddonTestCase;

abstract class TestCase extends AddonTestCase
{
    protected string $addonServiceProvider = ServiceProvider::class;
}
