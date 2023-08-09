<?php

declare(strict_types=1);

use Ecma\Intl\Locale;
use Ecma\Intl\Locale\Options;

$invalidScriptOptions = [
    '',
    'a',
    'ab',
    'abc',
    'abc7',
    'notascript',
    'undefined',
    "Bal\u0130",
    "Bal\u0131",

    // Value contains more than just the 'script' production.
    'ary-Arab',
    'Latn-SA',
    'Latn-vaidika',
    'Latn-a-asdf',
    'Latn-x-private',
];

it('throws ValueError for invalid script options', function (string $test): void {
    expect(fn () => new Locale('en', new Options(script: $test)))
        ->toThrow(ValueError::class);
})->with($invalidScriptOptions);
