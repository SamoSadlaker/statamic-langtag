<?php

namespace SamoSadlaker\StatamicLangtag\Tests;

class LocaleRouteTest extends TestCase
{
    public function test_switches_and_remembers_the_locale()
    {
        $this->get('/lang/en')
            ->assertRedirect('/en');

        $this->assertSame('en', session('locale'));
    }

    public function test_redirects_to_the_homepage_for_the_default_locale()
    {
        $this->get('/lang/sk')
            ->assertRedirect('/');

        $this->assertSame('sk', session('locale'));
    }

    public function test_does_not_switch_to_an_unsupported_locale()
    {
        $this->from('/foo')->get('/lang/de')
            ->assertRedirect('/foo');

        $this->assertNull(session('locale'));
    }
}
