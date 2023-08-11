<?php

declare(strict_types=1);

use Ecma\Intl\Locale;

$testData = [
    [
        'tag' => 'sv',
        'expected' => [
            'baseName' => 'sv',
            'language' => 'sv',
            'script' => null,
            'region' => null,
        ],
    ],
    [
        'tag' => 'sv-Latn',
        'expected' => [
            'baseName' => 'sv-Latn',
            'language' => 'sv',
            'script' => 'Latn',
            'region' => null,
        ],
    ],
    [
        'tag' => 'sv-SE',
        'expected' => [
            'baseName' => 'sv-SE',
            'language' => 'sv',
            'script' => null,
            'region' => 'SE',
        ],
    ],
    [
        'tag' => 'de-1901',
        'expected' => [
            'baseName' => 'de-1901',
            'language' => 'de',
            'script' => null,
            'region' => null,
        ],
    ],
];

it('verifies getters with missing tags', function (
    string $tag,
    array $expected,
): void {
    $loc = new Locale($tag);

    foreach ($expected as $property => $value) {
        expect($loc->$property)->toBe($value);
    }
})->with($testData);
