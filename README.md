LitmusResellerAPI
-----------------

[![Build Status](https://secure.travis-ci.org/yzalis/Litmus.png)](http://travis-ci.org/yzalis/Litmus)

**LitmusResellerAPI** is a kit allows you to dialog with the Litmus API service. You can
retreive all available clients, create test and get the results.

LitmusResellerAPI was written entirely in PHP 5.
It has been thoroughly tested in various real-world projects, and is actually in
use for high-demand e-business websites.
It runs on *nix and Windows platforms.

Requirements
------------

The SoapClient php extension is required.
See [http://us.php.net/manual/en/book.soap.php] for more informations.


Unit Tests
---------

Before testing you need to set your Litmus Reseller API Key and Password into `phpunit.xml.dist`.

To run the test suite, run Composer first to setup the autoloader:

```
php composer.phar install
```

Then run the following command:

```
phpunit
```

License
-------

LitmusResellerAPI is released under the MIT License. See the bundled LICENSE file for details..

Copyright
---------

LitmusAPI use the API of the [Litmus](http://www.litmus.com) service provided by Salted Services, Inc