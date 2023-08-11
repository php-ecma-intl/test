<?php

declare(strict_types=1);

use Ecma\Intl\Locale;

// BCP47 since forever, and ECMA-402 as consequence, do not consider tags that
// contain duplicate variants to be structurally valid.  This restriction also
// applies within the |tlang| component (indicating the source locale from which
// relevant content was transformed) of a broader language tag.
$testData = [
    // Direct matches are rejected.
    'de-t-en-emodeng-emodeng',

    // Case-insensitive matches are also rejected.
    'de-t-en-Emodeng-emodeng',

    // ...and in either order.
    'de-t-en-emodeng-Emodeng',

    // Repeat the above tests with additional variants interspersed at each point
    // for completeness.
    'de-t-en-variant-emodeng-emodeng',
    'de-t-en-variant-Emodeng-emodeng',
    'de-t-en-variant-emodeng-Emodeng',
    'de-t-en-emodeng-variant-emodeng',
    'de-t-en-Emodeng-variant-emodeng',
    'de-t-en-emodeng-variant-Emodeng',
    'de-t-en-emodeng-emodeng-variant',
    'de-t-en-Emodeng-emodeng-variant',
    'de-t-en-emodeng-Emodeng-variant',
];

it('throws ValueError for duplicate variants in tlang', function (string $test): void {
    expect(fn () => new Locale($test))
        ->toThrow(ValueError::class);
})->with($testData);
