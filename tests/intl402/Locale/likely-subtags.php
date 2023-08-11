<?php

declare(strict_types=1);

use Ecma\Intl\Locale;

$testDataMaximal = [
    // Language subtag is present.
    ['en', 'en-Latn-US'],

    // Language and script subtags are present.
    ['en-Latn', 'en-Latn-US'],
    ['en-Shaw', 'en-Shaw-GB'],
    ['en-Arab', 'en-Arab-US'],

    // Language and region subtags are present.
    ['en-US', 'en-Latn-US'],
    ['en-GB', 'en-Latn-GB'],
    ['en-FR', 'en-Latn-FR'],

    // Language, script, and region subtags are present.
    ['it-Kana-CA', 'it-Kana-CA'],

    // Undefined primary language.
    ['und', 'en-Latn-US'],
    ['und-Thai', 'th-Thai-TH'],
    ['und-419', 'es-Latn-419'],
    ['und-150', 'ru-Cyrl-RU'],
    ['und-AT', 'de-Latn-AT'],
    ['und-Cyrl-RO', 'bg-Cyrl-RO'],

    // Undefined primary language not required to change in all cases.
    ['und-AQ', 'und-Latn-AQ'],
];

$testDataMinimal = [
    // Language subtag is present.
    ['en', 'en'],

    // Language and script subtags are present.
    ['en-Latn', 'en'],
    ['ar-Arab', 'ar'],

    // Language and region subtags are present.
    ['en-US', 'en'],
    ['en-GB', 'en-GB'],

    // Reverse cases from |testDataMaximal|.
    ['en-Latn-US', 'en'],
    ['en-Shaw-GB', 'en-Shaw'],
    ['en-Arab-US', 'en-Arab'],
    ['en-Latn-GB', 'en-GB'],
    ['en-Latn-FR', 'en-FR'],
    ['it-Kana-CA', 'it-Kana-CA'],
    ['th-Thai-TH', 'th'],
    ['es-Latn-419', 'es-419'],
    ['ru-Cyrl-RU', 'ru'],
    ['de-Latn-AT', 'de-AT'],
    ['bg-Cyrl-RO', 'bg-RO'],
    ['und-Latn-AQ', 'und-AQ'],
];

// Add variants, extensions, and privateuse subtags and ensure they don't
// modify the result of the likely subtags algorithms.
$extras = [
    '',
    '-fonipa',
    '-a-not-assigned',
    '-u-attr',
    '-u-co',
    '-u-co-phonebk',
    '-x-private',
];

it('maximizes the likely subtags of specific locales', function (
    string $tag,
    string $maximized,
): void {
    $loc = new Locale($tag);
    $max = $loc->maximize();

    expect($max)
        ->not->toBe($loc)
        ->and((string) $max)
        ->toBe($maximized);
})->with($testDataMaximal);

it('minimizes the subtags of specific locales', function (
    string $tag,
    string $minimized,
): void {
    $loc = new Locale($tag);
    $min = $loc->minimize();

    expect($min)
        ->not->toBe($loc)
        ->and((string) $min)
        ->toBe($minimized);
})->with($testDataMinimal);

test('variants, extensions, and private use subtags do not modify the maximize algorithm', function (
    string $tag,
    string $maximized,
) use ($extras): void {
    expect((string) (new Locale($maximized))->maximize())
        ->toBe($maximized);

    foreach ($extras as $extra) {
        $input = $tag . $extra;
        $output = $maximized . $extra;

        expect((string) (new Locale($input))->maximize())
            ->toBe($output);
    }
})->with($testDataMaximal);

test('variants, extensions, and private use subtags do not modify the minimize algorithm', function (
    string $tag,
    string $minimized,
) use ($extras): void {
    expect((string) (new Locale($minimized))->minimize())
        ->toBe($minimized);

    foreach ($extras as $extra) {
        $input = $tag . $extra;
        $output = $minimized . $extra;

        expect((string) (new Locale($input))->minimize())
            ->toBe($output);
    }
})->with($testDataMinimal);

it('throws ValueError for "x-private"', function (): void {
    expect(fn () => new Locale('x-private'))
        ->toThrow(ValueError::class);
});
