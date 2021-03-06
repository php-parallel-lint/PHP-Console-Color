# Changelog

All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.0.0/).

## [Unreleased]

### Internal
- Travis: add build against PHP 8.0 [#12](https://github.com/php-parallel-lint/PHP-Console-Color/pull/12) from [@jrfnl](https://github.com/jrfnl).
- PHPCS: various improvements [#13](https://github.com/php-parallel-lint/PHP-Console-Color/pull/13) from [@jrfnl](https://github.com/jrfnl).
- PHPUnit: improve configuration [#14](https://github.com/php-parallel-lint/PHP-Console-Color/pull/14) from [@jrfnl](https://github.com/jrfnl).
- PHPUnit: use annotations for fixtures / cross-version compat up to PHPUnit 9.x [#16](https://github.com/php-parallel-lint/PHP-Console-Color/pull/16) from [@jrfnl](https://github.com/jrfnl).
- CI: switch to GH Actions [#17](https://github.com/php-parallel-lint/PHP-Console-Color/pull/17) from [@jrfnl](https://github.com/jrfnl).

## [1.0] - 2020-10-31

### Changed

- BC-Break: The top-level namespace for all classes has changed from `JakubOnderka` to `PHP_Parallel_Lint`. [#10](https://github.com/php-parallel-lint/PHP-Console-Color/pull/10) from [@grogy](https://github.com/grogy).

### Added

- Added downloading per month badge from [@grogy](https://github.com/grogy).
- Added license badge from [@grogy](https://github.com/grogy).
- Added instruction for installation from [@grogy](https://github.com/grogy).
- Composer: add description [#11](https://github.com/php-parallel-lint/PHP-Console-Color/pull/11) from [@jrfnl](https://github.com/jrfnl).

### Internal

- Updated PHP Parallel Lint dependency version restraint [#8](https://github.com/php-parallel-lint/PHP-Console-Color/pull/8) from [@jrfnl](https://github.com/jrfnl).
- Travis: changed from "trusty" to "xenial" [#7](https://github.com/php-parallel-lint/PHP-Console-Color/pull/7) from [@jrfnl](https://github.com/jrfnl).
- Update the unit tests setup [#9](https://github.com/php-parallel-lint/PHP-Console-Color/pull/9) from [@jrfnl](https://github.com/jrfnl).

## [0.3] - 2020-05-14

### Added

- Added changelog from [@reedy](https://github.com/reedy).

### Internal

- Travis: test against PHP 7.3 from [@samnela](https://github.com/samnela).
- Cleaned readme - new organization from previous package from [@grogy](https://github.com/grogy).
- Composer: updated dependancies to use new php-parallel-lint organisation from [@grogy](https://github.com/grogy).
- Composer: marked package as replacing jakub-onderka/php-console-color from [@jrfnl](https://github.com/jrfnl).
- Added a .gitattributes file from [@reedy](https://github.com/reedy).
- Travis: test against PHP 7.4 and nightly from [@jrfnl](https://github.com/jrfnl).
- Travis: only run PHPCS on PHP 7.4 from [@jrfnl](https://github.com/jrfnl).
