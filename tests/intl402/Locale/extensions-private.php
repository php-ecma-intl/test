<?php

declare(strict_types=1);

use Ecma\Intl\Locale;
use Ecma\Intl\Locale\Options;

$invalidTestData = [
    [
        'tag' => 'x-default',
        'options' => [
            'language' => 'fr',
            'script' => 'Cyrl',
            'region' => 'DE',
            'numberingSystem' => 'latn',
        ],
    ],
];

it('throws ValueError for invalid private use tags with valid options', function (
    string $tag,
    array $options,
): void {
    expect(fn () => new Locale($tag, new Options(...$options)))
        ->toThrow(ValueError::class);
})->with($invalidTestData);
