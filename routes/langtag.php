<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

Route::get('lang/{locale}', function (Request $request, string $locale) {
  $supportedLocales = config('statamic.langtag.supported', ['sk', 'en']);
  $defaultLocale = config('statamic.langtag.default', 'sk');
  if (!in_array($locale, $supportedLocales)) {
    return redirect()->back();
  }
  if ($request->session()->get('locale') === $locale) {
    return redirect()->back();
  }
  $request->session()->put('locale', $locale);
  app()->setLocale($locale);
  // Redirect to homepage of the selected locale
  if ($locale === $defaultLocale) {
    return redirect('/');
  }
  return redirect('/' . $locale);
})->name('setLocale');