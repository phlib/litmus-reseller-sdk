# Change Log
All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](http://keepachangelog.com/)
and this project adheres to [Semantic Versioning](http://semver.org/).

## [Unreleased]

### Changed
- **BC break**: Namespace changed to `Phlib\LitmusResellerSDK`.
- Change licence to LGPLv3 to match other Phlib projects.
### Removed
- **BC break**: Removed support for PHP versions <= 7.2 as they are no longer
  [actively supported](https://php.net/supported-versions.php)
  by the PHP project.
- **BC break**: Split subject-line preview SDK out to
  [`phlib/litmus-subjectline-preview`](https://github.com/phlib/litmus-subjectline-preview)
  as it doesn't use the reseller API.

## [2.0.1] - 2021-03-30

- Update maintainer info to Phlib.
  Thanks to [blaugueux](https://github.com/blaugueux)!

## [2.0.0] - 2016-12-13

 * Renamed package to `yzalis/litmus`.
 * Changed namespace to `Litmus` only.
 * Changed licence to MIT.

## [1.1.0] - 2012-06-07

 * Added namespace support
 * Added phpunit tests
 * Added boostrap class using php spl_autoload_register
 * Added SpamResult and SpamHeader classes
 * Added composer support
 * Reorganize directory structure
 * Improved documentation
 * Improved examples
 * Improved php codding standards suport
 * Improved typo

## [1.0.0] - 2011-03-16

 * Initial version !
