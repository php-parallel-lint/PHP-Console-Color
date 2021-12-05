# Changelog

All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.0.0/).

## [Unreleased]

### Internal
- Travis: add build against PHP 8.0 [#12] from [@jrfnl].
- PHPCS: various improvements [#13] from [@jrfnl].
- PHPUnit: improve configuration [#14] from [@jrfnl].
- PHPUnit: use annotations for fixtures / cross-version compat up to PHPUnit 9.x [#16] from [@jrfnl].
- CI: switch to GH Actions [#17] from [@jrfnl].
- GH Actions: set error reporting to E_ALL [#18] from [@jrfnl].

[#12]: https://github.com/php-parallel-lint/PHP-Console-Color/pull/12
[#13]: https://github.com/php-parallel-lint/PHP-Console-Color/pull/13
[#14]: https://github.com/php-parallel-lint/PHP-Console-Color/pull/14
[#16]: https://github.com/php-parallel-lint/PHP-Console-Color/pull/16
[#17]: https://github.com/php-parallel-lint/PHP-Console-Color/pull/17
[#18]: https://github.com/php-parallel-lint/PHP-Console-Color/pull/18


## [1.0] - 2020-10-31

### Changed

- BC-Break: The top-level namespace for all classes has changed from `JakubOnderka` to `PHP_Parallel_Lint`. [#10] from [@grogy].

### Added

- Added downloading per month badge from [@grogy].
- Added license badge from [@grogy].
- Added instruction for installation from [@grogy].
- Composer: add description [#11] from [@jrfnl].

### Internal

- Updated PHP Parallel Lint dependency version restraint [#8] from [@jrfnl].
- Travis: changed from "trusty" to "xenial" [#7] from [@jrfnl].
- Update the unit tests setup [#9] from [@jrfnl].

[#7]: https://github.com/php-parallel-lint/PHP-Console-Color/pull/7
[#8]: https://github.com/php-parallel-lint/PHP-Console-Color/pull/8
[#9]: https://github.com/php-parallel-lint/PHP-Console-Color/pull/9
[#10]: https://github.com/php-parallel-lint/PHP-Console-Color/pull/10
[#11]: https://github.com/php-parallel-lint/PHP-Console-Color/pull/11


## [0.3] - 2020-05-14

### Added

- Added changelog from [@reedy].

### Internal

- Travis: test against PHP 7.3 from [@samnela].
- Cleaned readme - new organization from previous package from [@grogy].
- Composer: updated dependancies to use new php-parallel-lint organisation from [@grogy].
- Composer: marked package as replacing jakub-onderka/php-console-color from [@jrfnl].
- Added a .gitattributes file from [@reedy].
- Travis: test against PHP 7.4 and nightly from [@jrfnl].
- Travis: only run PHPCS on PHP 7.4 from [@jrfnl].


[Unreleased]: https://github.com/php-parallel-lint/PHP-Console-Color/compare/v1.0...HEAD
[1.0]: https://github.com/php-parallel-lint/PHP-Console-Color/compare/v0.3...v1.0
[0.3]: https://github.com/php-parallel-lint/PHP-Console-Color/compare/v0.2...v0.3

[@grogy]: https://github.com/grogy
[@jrfnl]: https://github.com/jrfnl
[@reedy]: https://github.com/reedy
[@samnela]: https://github.com/samnela
