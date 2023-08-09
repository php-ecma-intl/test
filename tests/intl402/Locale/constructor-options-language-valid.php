<?php

declare(strict_types=1);

use Ecma\Intl\Locale;
use Ecma\Intl\Locale\Options;

$validLanguageOptions = [
    ['fr', 'fr'],
    [newStringable('de'), 'de'],
];

it('sets language options on the locale', function (
    Stringable | string $test,
    ?string $expected = null,
): void {
    $expect = $expected ?? 'en';

    expect((string) new Locale('en', new Options(language: $test)))
        ->toBe($expect);

    $expect = ($expected ?? 'en') . '-US';
    expect((string) new Locale('en-US', new Options(language: $test)))
        ->toBe($expect);
})->with($validLanguageOptions);

it('throws ValueError when tag does not match subtag production', function (
    Stringable | string $test,
): void {
    expect(fn () => new Locale('en-els', new Options(language: $test)))
        ->toThrow(ValueError::class);
})->with($validLanguageOptions);

$invalidLanguageOptions = [
    'zh-cmn',
    'ZH-CMN',
    'abcd',
];

it('throws ValueError with invalid language options', function (
    Stringable | string $test,
): void {
    expect(fn () => new Locale('en', new Options(language: $test)))
        ->toThrow(ValueError::class)
        ->and(fn () => new Locale('en-US', new Options(language: $test)))
        ->toThrow(ValueError::class)
        ->and(fn () => new Locale('en-els', new Options(language: $test)))
        ->toThrow(ValueError::class);
})->with($invalidLanguageOptions);
