<?php

declare(strict_types=1);

use Ecma\Intl\Locale;
use Ecma\Intl\Locale\Options;

$invalidRegionOptions = [
    '',
    'a',
    'abc',
    'a7',

    // Value cannot be parsed as a 'region' production.
    'notaregion',

    // Value contains more than just the 'region' production.
    'SA-vaidika',
    'SA-a-asdf',
    'SA-x-private',

    // Value contains more than just the 'script' production.
    'ary-Arab',
    'Latn-SA',
    'Latn-vaidika',
    'Latn-a-asdf',
    'Latn-x-private',
];

it('throws ValueError for invalid region options', function (string $test): void {
    expect(fn () => new Locale('en', new Options(region: $test)))
        ->toThrow(ValueError::class);
})->with($invalidRegionOptions);
