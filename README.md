<h1 align="center">php-ecma-intl/test</h1>

<p align="center">
    <strong>Conformance test suite for pecl/ecma_intl</strong>
</p>

<!--
TODO: Make sure the following URLs are correct and working for your project.
      Then, remove these comments to display the badges, giving users a quick
      overview of your package.

<p align="center">
    <a href="https://github.com/php-ecma-intl/ext"><img src="https://img.shields.io/badge/source-php--ecma--intl/ext-blue.svg?style=flat-square" alt="Source Code"></a>
    <a href="https://packagist.org/packages/php-ecma-intl/ext"><img src="https://img.shields.io/packagist/v/php-ecma-intl/ext.svg?style=flat-square&label=release" alt="Download Package"></a>
    <a href="https://php.net"><img src="https://img.shields.io/packagist/php-v/php-ecma-intl/ext.svg?style=flat-square&colorB=%238892BF" alt="PHP Programming Language"></a>
    <a href="https://github.com/php-ecma-intl/ext/blob/main/LICENSE"><img src="https://img.shields.io/packagist/l/php-ecma-intl/ext.svg?style=flat-square&colorB=darkcyan" alt="Read License"></a>
    <a href="https://github.com/php-ecma-intl/ext/actions/workflows/continuous-integration.yml"><img src="https://img.shields.io/github/actions/workflow/status/php-ecma-intl/ext/continuous-integration.yml?branch=main&style=flat-square&logo=github" alt="Build Status"></a>
    <a href="https://codecov.io/gh/php-ecma-intl/ext"><img src="https://img.shields.io/codecov/c/gh/php-ecma-intl/ext?label=codecov&logo=codecov&style=flat-square" alt="Codecov Code Coverage"></a>
    <a href="https://shepherd.dev/github/php-ecma-intl/ext"><img src="https://img.shields.io/endpoint?style=flat-square&url=https%3A%2F%2Fshepherd.dev%2Fgithub%2Fphp-ecma-intl%2Fext%2Fcoverage" alt="Psalm Type Coverage"></a>
</p>
-->


## About

This is a PHP port of the `intl402` test suite for [ECMA-402](https://tc39.es/ecma402/)
from [Test262](https://github.com/tc39/test262). This port is up-to-date with
Test262, as of the version of Test262 included in this project as a Git
submodule at `./resources/test262`.

Since PHP does not follow the same conventions as JavaScript, PHP code
implementing ECMA-402 will differ from the specification. Where it differs,
this test suite follows the reference implementation for
[pecl/ecma_intl](https://github.com/php-ecma-intl/ext). Polyfills may use
this test suite to ensure compatibility with pecl/ecma_intl.

This project adheres to a [code of conduct](CODE_OF_CONDUCT.md). By
participating in this project and its community, you are expected to uphold
this code.


## Installation

Install this package as a dependency using [Composer](https://getcomposer.org).

``` bash
composer require --dev php-ecma-intl/test
```


## Usage

Use these tests to ensure your polyfill library conforms to the pecl/ecma_intl
implementation of [ECMA-402](https://tc39.es/ecma402/).

To add these tests to your project's test runner, add the following to your
project's `phpunit.xml` or `phpunit.xml.dist` file:

```xml
<testsuites>
    <testsuite name="ecma_intl conformance">
        <directory suffix=".php">./vendor/php-ecma-intl/test/tests</directory>
    </testsuite>
</testsuites>
```

Then, create a file (if you don't already have one) at `tests/Pest.php`, and
add the following to it:

```php
include_once __DIR__ . '/vendor/php-ecma-intl/test/harness/testIntl.php';
```

Now, you may run `vendor/bin/pest --testsuite "ecma_intl conformance"` to
execute the conformance tests provided by this package.


## Contributing

Contributions are welcome! To contribute, please familiarize yourself with
[CONTRIBUTING.md](CONTRIBUTING.md).


## Coordinated Disclosure

Keeping user information safe and secure is a top priority, and we welcome the
contribution of external security researchers. If you believe you've found a
security issue in software that is maintained in this repository, please read
[SECURITY.md](SECURITY.md) for instructions on submitting a vulnerability report.


## Copyright and License

pecl/ecma_intl is copyright © [php-ecma-intl](https://github.com/php-ecma-intl)
contributors and licensed for use under the terms of the BSD 3-Clause "New" or
"Revised" License (BSD-3-Clause). Please see [LICENSE](LICENSE) for more
information.

php-ecma-intl/test may utilize copyrighted material under license from the
following projects:

- [Test262: ECMAScript Test Suite](https://github.com/tc39/test262)

Please see [NOTICE](NOTICE) for more information.
