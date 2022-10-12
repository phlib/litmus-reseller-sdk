# phlib/litmus-reseller-sdk

[![Code Checks](https://img.shields.io/github/workflow/status/phlib/litmus-reseller-sdk/CodeChecks?logo=github)](https://github.com/phlib/litmus-reseller-sdk/actions/workflows/code-checks.yml)
[![Codecov](https://img.shields.io/codecov/c/github/phlib/litmus-reseller-sdk.svg?logo=codecov)](https://codecov.io/gh/phlib/litmus-reseller-sdk)
[![Latest Stable Version](https://img.shields.io/packagist/v/phlib/litmus-reseller-sdk.svg?logo=packagist)](https://packagist.org/packages/phlib/litmus-reseller-sdk)
[![Total Downloads](https://img.shields.io/packagist/dt/phlib/litmus-reseller-sdk.svg?logo=packagist)](https://packagist.org/packages/phlib/litmus-reseller-sdk)
![Licence](https://img.shields.io/github/license/phlib/litmus-reseller-sdk.svg)

SDK to allow you to use the legacy Litmus Reseller SOAP API.
You can retrieve all available clients, create a test and get the results.

**April 2021**: [Phlib](https://github.com/phlib) have taken over the
maintenance of this package from [blaugueux](https://github.com/blaugueux).
Huge thanks for trusting us to continue his work! We've been using this
package for years in our commercial projects, so we're looking forward to
keeping it going!

Thankfully, Litmus have
[archived the documentation](https://litmus.github.io/legacy-litmus-api-docs/)
for this legacy API.

Litmus deprecated this API in 2015.
New implementations should use their current APIs, listed at [docs.litmus.com](https://docs.litmus.com).

## Install

Via Composer

```sh
$ composer require phlib/litmus-reseller-sdk
```

## Usage

See the [Legacy litmus SOAP API docs](https://litmus.github.io/legacy-litmus-api-docs/SOAP/Legacy%20SOAP%20Web%20Service%3A%20Process%20for%20running%20email%20tests)
for an example workflow.

* Create an empty `EmailTest` object and pass it to `Litmus::createEmailTest()`.
* This will return a new `EmailTest` object containing the unique ID.
* The ID can be used when calling `Litmus::getEmailTest()` to view the state.
* The `EmailTest::getResults()` method can be used to get details on the state
  for each individual client in the test, the ID of which can be used with
  `Litmus::getResult()` to get the full result details.

### Callbacks

If you have a callback URL configured with your Litmus reseller account,
it will be called with an XML string when results are available,
rather than needing to poll `Litmus::getEmailTest()`.
The Callback `hydrateXml()` method can be used to create the appropriate result object.

## License

This package is free software: you can redistribute it and/or modify
it under the terms of the GNU Lesser General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU Lesser General Public License for more details.

You should have received a copy of the GNU Lesser General Public License
along with this program.  If not, see <http://www.gnu.org/licenses/>.
