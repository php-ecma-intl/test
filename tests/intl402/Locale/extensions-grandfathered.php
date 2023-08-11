<?php

declare(strict_types=1);

use Ecma\Intl\Locale;
use Ecma\Intl\Locale\Options;

$testData = [
    // Regular grandfathered without modern replacement.
    [
        'tag' => 'cel-gaulish',
        'options' => [
            'language' => 'fr',
            'script' => 'Cyrl',
            'region' => 'FR',
            'numberingSystem' => 'latn',
        ],
        'canonical' => 'fr-Cyrl-FR-u-nu-latn',
    ],

    // Regular grandfathered with modern replacement.
    [
        'tag' => 'art-lojban',
        'options' => [
            'language' => 'fr',
            'script' => 'Cyrl',
            'region' => 'ZZ',
            'numberingSystem' => 'latn',
        ],
        'canonical' => 'fr-Cyrl-ZZ-u-nu-latn',
    ],
];

it('verifies handling of options with grandfathered tags', function (
    string $tag,
    array $options,
    string $canonical,
): void {
    $loc = new Locale($tag, new Options(...$options));
    expect((string) $loc)->toBe($canonical);

    foreach ($options as $property => $value) {
        expect($loc->$property)->toBe($value);
    }
})->with($testData);

$invalidTestData = [
    [
        'tag' => 'i-default',
        'options' => [
            'language' => 'fr',
            'script' => 'Cyrl',
            'region' => 'DE',
            'numberingSystem' => 'latn',
        ],
    ],
    [
        'tag' => 'en-gb-oed',
        'options' => [
            'language' => 'fr',
            'script' => 'Cyrl',
            'region' => 'US',
            'numberingSystem' => 'latn',
        ],
    ],
    [
        'tag' => 'zh-min',
        'options' => [],
    ],
];

it('throws ValueError for invalid grandfather tags with valid options', function (
    string $tag,
    array $options,
): void {
    expect(fn () => new Locale($tag, new Options(...$options)))
        ->toThrow(ValueError::class);
})->with($invalidTestData);
