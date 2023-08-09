<?php

declare(strict_types=1);

use Ecma\Intl\Locale;
use Ecma\Intl\Locale\Options;

$validCollationOptions = [
    ['abc', 'en-u-co-abc'],
    ['abcd', 'en-u-co-abcd'],
    ['abcde', 'en-u-co-abcde'],
    ['abcdef', 'en-u-co-abcdef'],
    ['abcdefg', 'en-u-co-abcdefg'],
    ['abcdefgh', 'en-u-co-abcdefgh'],
    ['12345678', 'en-u-co-12345678'],
    ['1234abcd', 'en-u-co-1234abcd'],
    ['1234abcd-abc123', 'en-u-co-1234abcd-abc123'],
    [newStringable('1234abcd-abc123'), 'en-u-co-1234abcd-abc123'],
];

it('sets collation options on the locale', function (
    Stringable | string $collation,
    string $expected,
): void {
    $locale = new Locale('en', new Options(collation: $collation));

    expect((string) $locale)
        ->toBe($expected)
        ->and($locale->collation)
        ->toBe((string) $collation);
})->with($validCollationOptions);

it('overrides collation options on the locale', function (
    Stringable | string $collation,
    string $expected,
): void {
    $locale = new Locale('en-u-co-foobar', new Options(collation: $collation));

    expect((string) $locale)
        ->toBe($expected)
        ->and($locale->collation)
        ->toBe((string) $collation);
})->with($validCollationOptions);
