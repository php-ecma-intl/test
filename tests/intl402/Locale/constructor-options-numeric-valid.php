<?php

declare(strict_types=1);

use Ecma\Intl\Locale;
use Ecma\Intl\Locale\Options;

$validNumericOptions = [
    ['en', false, false, 'en-u-kn-false'],
    ['en', true, true, 'en-u-kn'],
    ['en', null, false, 'en'],
    ['en-u-kn-true', false, false, 'en-u-kn-false'],
    ['en-u-kn-true', true, true, 'en-u-kn'],

    // In PHP, we're using `null` to mean the same as `undefined` in JavaScript,
    // so null values do not override original values.
    ['en-u-kn-true', null, true, 'en-u-kn'],

    ['en-u-kf-lower', false, false, 'en-u-kf-lower-kn-false'],
    ['en-u-kf-lower', true, true, 'en-u-kf-lower-kn'],
    ['en-u-kf-lower', null, false, 'en-u-kf-lower'],
];

it('sets numberingSystem options on the locale', function (
    string $tag,
    bool | null $test,
    bool $expectedNumeric,
    string $expectedTag,
): void {
    $locale = new Locale($tag, new Options(numeric: $test));

    expect((string) $locale)
        ->toBe($expectedTag)
        ->and($locale->numeric)
        ->toBe($expectedNumeric);
})->with($validNumericOptions);
