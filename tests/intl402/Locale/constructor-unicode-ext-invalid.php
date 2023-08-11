<?php

declare(strict_types=1);

use Ecma\Intl\Locale;

$invalidLanguageTags = [
    // Unicode extension sequence is incomplete.
    'da-u',
    'da-u-',
    'da-u--',
    'da-u-t-latn',
    'da-u-x-priv',

    // Duplicate 'u' singleton.
    'da-u-ca-gregory-u-ca-buddhist',
];

it('throws ValueError for invalid language options', function (string $test): void {
    expect(fn () => new Locale($test))
        ->toThrow(ValueError::class);
})->with($invalidLanguageTags);
