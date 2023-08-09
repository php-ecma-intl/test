<?php

declare(strict_types=1);

use Ecma\Intl\Locale;
use Ecma\Intl\Locale\Options;

$testData = [
    // Canonicalized version of "en-GB-oed", which we can add "US" to right away.
    [
        'tag' => 'en-GB-oxendict',
        'options' => ['region' => 'US', 'calendar' => 'gregory'],
        'canonical' => 'en-US-oxendict-u-ca-gregory',
    ],
];

it('handles options with grandfathered tags', function (
    string $tag,
    array $options,
    string $canonical,
): void {
    expect((string) new Locale($tag, new Options(...$options)))
        ->toBe($canonical);
})->with($testData);

$exceptionTestData = [
    [
        'tag' => 'no-bok',
        'options' => ['region' => 'NO', 'calendar' => 'gregory'],
    ],
    [
        'tag' => 'no-bok',
        'options' => ['region' => 'SE', 'calendar' => 'gregory'],
    ],
    [
        'tag' => 'no-bok-NO',
        'options' => ['region' => 'SE', 'calendar' => 'gregory'],
    ],
    [
        'tag' => 'no-bok-SE',
        'options' => ['region' => 'NO', 'calendar' => 'gregory'],
    ],
];

it('throws ValueError for options with specific grandfathered tags', function (
    string $tag,
    array $options,
): void {
    expect(fn () => new Locale($tag, new Options(...$options)))
        ->toThrow(ValueError::class);
})->with($exceptionTestData);
