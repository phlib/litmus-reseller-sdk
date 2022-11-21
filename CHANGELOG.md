# Change Log
All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](http://keepachangelog.com/)
and this project adheres to [Semantic Versioning](http://semver.org/).

## [Unreleased]

### Added
- Support PHP v8.
- New method `createEmailTestForClients()` as the recommended and simpler way to
  create new tests with just an array of EmailClient ApplicationNames.
- Type declarations to all methods and properties.
- Namespaced exceptions for errors thrown within this package.
- Throw `NotFoundException` for `getEmailTest()` and `getResult()` when Litmus
  has no matching data for the given ID.
### Fixed
- Creating callback object from XML did not correctly read boolean values.
### Changed
- **BC break**: Namespace changed to `Phlib\LitmusResellerSDK`.
- **BC break**: Simplify the paramters for `createEmailTest()` to accept a list
  of client ApplicationNames and sandbox flag in native types. The previous
  behaviour is deprecated and available as `createEmailTestRaw()`.
- **BC break**: Callback result objects are created using `Callback\Factory`.
- Change licence to LGPLv3 to match other Phlib projects.
### Removed
- **BC break**: Removed support for PHP versions <= 7.3 as they are no longer
  [actively supported](https://php.net/supported-versions.php)
  by the PHP project.
- **BC break**: Split subject-line preview SDK out to
  [`phlib/litmus-subjectline-preview`](https://github.com/phlib/litmus-subjectline-preview)
  as it doesn't use the reseller API.
- **BC break**: Remove `EmailTest::initializeFreeTest()` as one of the clients
  no longer exists, and there's no documentation to confirm this.
- **BC break**: Remove PageTest classes as this isn't in the Litmus API.
- **BC break**: Remove Base* classes. This should not affect implementations,
  which would be using the child `Email*` or `Spam*` classes instead.
- **BC break**: Remove callback `Type` getter, as the different classes already
  give the same behaviour.
- **BC break**: Remove public properties from `EmailClient`; use getters.
- **BC break**: Remove setter methods, so classes behave as immutable objects.

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
