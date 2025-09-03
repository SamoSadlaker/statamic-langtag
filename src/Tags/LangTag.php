<?php

namespace SamoSadlaker\StatamicLangtag\Tags;

use Statamic\Tags\Tags;

class LangTag extends Tags
{
  protected static $aliases = ['lt'];

  private $defaultLocale;
  private $locales;

  private $supported;

  public function __construct()
  {
    $this->defaultLocale = config('statamic.langtag.default', 'sk');
    $this->supported = config('statamic.langtag.supported', ['sk', 'en']);
    $this->locales = array_diff($this->supported, [$this->defaultLocale]);
  }

  /**
   * The {{ lang_tag }} tag.
   *
   * @return string|array
   */
  public function index()
  {
    $this->fix();

    // Get parameters passed to the tag
    $default = $this->params->get('default', '');

    foreach ($this->locales as $locale) {
      if ($this->isLocale($locale)) {
        // Return text for the current locale if available
        $text = $this->params->get($locale, '');
        if (!empty($text)) {
          return $text;
        }
      }
    }

    // Otherwise return default
    return $default;
  }

  public function is(): bool
  {
    return $this->isLocale($this->params->get('locale', $this->defaultLocale));
  }

  private function isLocale(string $locale): bool
  {
    if (!in_array($locale, $this->supported)) {
      return false;
    }
    $this->fix();
    return app()->getLocale() === $locale;
  }

  public function get(): string
  {
    $this->fix();
    return app()->getLocale();
  }

  public function fix(): void
  {
    app()->setLocale(session('locale', $this->defaultLocale));
  }
}
