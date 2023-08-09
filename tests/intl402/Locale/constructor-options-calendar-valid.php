<?php

declare(strict_types=1);

use Ecma\Intl\Locale;
use Ecma\Intl\Locale\Options;

// alphanum = (ALPHA / DIGIT)     ; letters and numbers
// calendar = (3*8alphanum) *("-" (3*8alphanum))
$validCalendarOptions = [
    ['abc', 'en-u-ca-abc'],
    ['abcd', 'en-u-ca-abcd'],
    ['abcde', 'en-u-ca-abcde'],
    ['abcdef', 'en-u-ca-abcdef'],
    ['abcdefg', 'en-u-ca-abcdefg'],
    ['abcdefgh', 'en-u-ca-abcdefgh'],
    ['12345678', 'en-u-ca-12345678'],
    ['1234abcd', 'en-u-ca-1234abcd'],
    ['1234abcd-abc123', 'en-u-ca-1234abcd-abc123'],
    [newStringable('abcdefg'), 'en-u-ca-abcdefg'],
];

it('sets calendar options on the locale', function (
    Stringable | string $calendar,
    string $expected,
): void {
    $locale = new Locale('en', new Options(calendar: $calendar));

    expect((string) $locale)
        ->toBe($expected)
        ->and($locale->calendar)
        ->toBe((string) $calendar);
})->with($validCalendarOptions);

it('overrides calendar options on the locale', function (
    Stringable | string $calendar,
    string $expected,
): void {
    $locale = new Locale('en-u-ca-gregory', new Options(calendar: $calendar));

    expect((string) $locale)
        ->toBe($expected)
        ->and($locale->calendar)
        ->toBe((string) $calendar);
})->with($validCalendarOptions);
