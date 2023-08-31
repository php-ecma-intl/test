<?php

declare(strict_types=1);

use Ecma\Intl\Locale;
use Ecma\Intl\Locale\Options;

$invalidCurrencyOptions = [
    '',
    'a',
    'ab',
    'abcd',
    'a-c',
];

it('throws ValueError for invalid currency options', function (string $test): void {
    expect(fn () => new Locale('en', new Options(currency: $test)))
        ->toThrow(ValueError::class);
})->with($invalidCurrencyOptions);
