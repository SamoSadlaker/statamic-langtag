# Changelog

All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.1.0/),
and this project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

## [1.1.0] - Unreleased

### Added
- Support for Statamic 6 (Statamic 5.x remains supported).
- Documented the `{{ lang_tag:get }}` tag in the README.
- Real test coverage for the tag and the locale-switching route.

### Changed
- Composer: require PHP `^8.1`.
- Composer: widened testbench requirement (`^9.0 | ^10.0 | ^11.0`) to cover Statamic 5 and 6.
- Composer: added `php` constraint, `keywords`, `homepage`, `support`, and marketplace metadata (`developer`, `developer-url`, `url`).
- Service provider cleanup: config is now merged in `register()`, the tag is registered explicitly, and the redundant `parent::boot()` call was removed.

## [1.0.2] - 2025-09-03

### Changed
- Fixed the locale check in the `{{ lang_tag:is }}` tag.

## [1.0.1] - 2025-09-03

### Added
- `{{ lang_tag:get }}` method returning the current locale.

## [1.0.0] - 2025-09-03

### Added
- Initial release: `{{ lang_tag }}` tag (alias `{{ lt }}`), locale switching route, config for default and supported locales.