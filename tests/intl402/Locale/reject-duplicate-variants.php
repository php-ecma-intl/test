<?php

declare(strict_types=1);

// BCP47 since forever, and ECMA-402 as consequence, do not consider tags that
// contain duplicate variants to be structurally valid.
use Ecma\Intl\Locale;

$testData = [
    // Direct matches are rejected.
    'en-emodeng-emodeng',

    // Case-insensitive matches are also rejected.
    'en-Emodeng-emodeng',

    // ...and in either order.
    'en-emodeng-Emodeng',

    // Repeat the above tests with additional variants interspersed at each point
    // for completeness.
    'en-variant-emodeng-emodeng',
    'en-variant-Emodeng-emodeng',
    'en-variant-emodeng-Emodeng',
    'en-emodeng-variant-emodeng',
    'en-Emodeng-variant-emodeng',
    'en-emodeng-variant-Emodeng',
    'en-emodeng-emodeng-variant',
    'en-Emodeng-emodeng-variant',
    'en-emodeng-Emodeng-variant',
];

it('throws ValueError for duplicate variants', function (string $test): void {
    expect(fn () => new Locale($test))
        ->toThrow(ValueError::class);
})->with($testData);
