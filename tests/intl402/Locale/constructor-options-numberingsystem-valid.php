<?php

declare(strict_types=1);

use Ecma\Intl\Locale;
use Ecma\Intl\Locale\Options;

$validNumberingSystemOptions = [
    ['abc', 'en-u-nu-abc'],
    ['abcd', 'en-u-nu-abcd'],
    ['abcde', 'en-u-nu-abcde'],
    ['abcdef', 'en-u-nu-abcdef'],
    ['abcdefg', 'en-u-nu-abcdefg'],
    ['abcdefgh', 'en-u-nu-abcdefgh'],
    ['12345678', 'en-u-nu-12345678'],
    ['1234abcd', 'en-u-nu-1234abcd'],
    ['1234abcd-abc123', 'en-u-nu-1234abcd-abc123'],
    [newStringable('abcdef'), 'en-u-nu-abcdef'],
];

it('sets numberingSystem options on the locale', function (
    Stringable | string $numberingSystem,
    string $expected,
): void {
    $locale = new Locale('en', new Options(numberingSystem: $numberingSystem));

    expect((string) $locale)
        ->toBe($expected)
        ->and($locale->numberingSystem)
        ->toBe((string) $numberingSystem);
})->with($validNumberingSystemOptions);

it('overrides numberingSystem options on the locale', function (
    Stringable | string $numberingSystem,
    string $expected,
): void {
    $locale = new Locale('en-u-nu-latn', new Options(numberingSystem: $numberingSystem));

    expect((string) $locale)
        ->toBe($expected)
        ->and($locale->numberingSystem)
        ->toBe((string) $numberingSystem);
})->with($validNumberingSystemOptions);
