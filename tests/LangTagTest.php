<?php

namespace SamoSadlaker\StatamicLangtag\Tests;

use Statamic\Facades\Antlers;

class LangTagTest extends TestCase
{
    private function render(string $antlers, ?string $locale = null): string
    {
        if ($locale === null) {
            session()->forget('locale');
        } else {
            session(['locale' => $locale]);
        }

        return (string) Antlers::parse($antlers, []);
    }

    public function test_returns_the_string_matching_the_current_locale()
    {
        $this->assertSame('Hello', $this->render('{{ lang_tag default="Ahoj" en="Hello" }}', 'en'));
    }

    public function test_falls_back_to_the_default_string_for_the_default_locale()
    {
        $this->assertSame('Ahoj', $this->render('{{ lang_tag default="Ahoj" en="Hello" }}', 'sk'));
    }

    public function test_falls_back_to_the_default_string_when_no_locale_is_selected()
    {
        $this->assertSame('Ahoj', $this->render('{{ lang_tag default="Ahoj" en="Hello" }}'));
    }

    public function test_falls_back_to_the_default_string_when_the_locale_parameter_is_missing()
    {
        $this->assertSame('Ahoj', $this->render('{{ lang_tag default="Ahoj" }}', 'en'));
    }

    public function test_supports_the_lt_alias()
    {
        $this->assertSame('Hello', $this->render('{{ lt default="Ahoj" en="Hello" }}', 'en'));
    }

    public function test_checks_whether_the_current_locale_matches()
    {
        $this->assertSame('yes', $this->render('{{ if {lang_tag:is locale="en"} }}yes{{ else }}no{{ /if }}', 'en'));
        $this->assertSame('no', $this->render('{{ if {lang_tag:is locale="en"} }}yes{{ else }}no{{ /if }}', 'sk'));
    }

    public function test_returns_the_current_locale()
    {
        $this->assertSame('en', $this->render('{{ lang_tag:get }}', 'en'));
        $this->assertSame('sk', $this->render('{{ lang_tag:get }}', 'sk'));
    }
}
