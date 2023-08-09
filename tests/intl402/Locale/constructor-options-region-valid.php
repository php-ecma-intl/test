<?php

declare(strict_types=1);

use Ecma\Intl\Locale;
use Ecma\Intl\Locale\Options;

$validRegionOptions = [
    [null, null],
    ['FR', 'en-FR'],
    ['554', 'en-NZ'],
    [newStringable('554'), 'en-NZ'],
];

it('sets region options on the locale', function (
    Stringable | string | null $region,
    ?string $expected,
): void {
    $expect = $expected ?? 'en';
    $locale = new Locale('en', new Options(region: $region));
    expect((string) $locale)->toBe($expect);

    $expect = $expected ?? 'en-US';
    $locale = new Locale('en-US', new Options(region: $region));
    expect((string) $locale)->toBe($expect);

    $expect = ($expected ?? 'en') . '-u-ca-gregory';
    $locale = new Locale('en-u-ca-gregory', new Options(region: $region));
    expect((string) $locale)->toBe($expect);

    $expect = newStringable(($expected ?? 'en-US') . '-u-ca-gregory');
    $locale = new Locale('en-US-u-ca-gregory', new Options(region: $region));
    expect((string) $locale)->toBe((string) $expect);
})->with($validRegionOptions);
