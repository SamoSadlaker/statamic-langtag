# Statamic Langtag
![last tag](https://img.shields.io/github/v/tag/samosadlaker/statamic-langtag?style=flat-square)

Statamic Langtag is a Statamic CMS addon that simplifies multi-language content handling. It provides a custom tag for managing locale-specific content blocks and routes to switch between supported languages. This addon is especially useful for Statamic sites with multiple locales, helping you easily display content in different languages based on user selection or session.

## Features

- Custom Statamic tag (`{{ lang_tag }}` and alias `{{ lt }}`) for rendering language-specific content
- Configuration for default and supported locales (e.g., 'sk', 'en')
- Web route for switching locales via URL (`/lang/{locale}`)
- Automatically sets and remembers the user's locale in the session
- Easy integration with Statamic templates

## Installation

Install via Composer:

```bash
composer require samosadlaker/statamic-langtag
```

## Configuration

Publish the config file to customize locales:

```bash
php artisan vendor:publish --tag=statamic-langtag
```

Edit `config/statamic/langtag.php`:

```php
return [
  'default' => 'sk',
  'supported' => ['sk', 'en'],
];
```

## Usage

### Switch Locale

Navigate to `/lang/{locale}` to switch to a supported locale. For example: `/lang/en` or `/lang/sk`.

### Template Tag

Use in your Antlers templates:

```antlers
{{ lang_tag default="Ahoj" en="Hello" }}
```

Using antlers variable

```antlers
{{ lang_tag default="{title}" en="{en_title}" }}
```

This will display the string based on the current locale, using 'default' if no match.

### Check locale

Conditions for checking current locale

```antlers
{{ {lang_tag:is locale="en"} ? 'Yes' : 'No'}}
```

### Alias

You can also use the alias:

```antlers
{{ lt default="Ahoj" en="Welcome" }}
```

### Fix locale
```antlers
{{lang_tag:fix }}
```

## License

MIT License. See [LICENSE](LICENSE) for details.