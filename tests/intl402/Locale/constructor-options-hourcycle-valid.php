<?php

declare(strict_types=1);

use Ecma\Intl\Locale;
use Ecma\Intl\Locale\Options;

$validHourCycleOptions = [
    'h11',
    'h12',
    'h23',
    'h24',
    newStringable('h24'),
];

it('sets hourCycle options on the locale', function (Stringable | string $test): void {
    $expected = (string) $test;
    $expect = "en-u-hc-$expected";

    $locale = new Locale('en', new Options(hourCycle: $test));
    expect((string) $locale)->toBe($expect);

    $locale = new Locale('en-u-hc-h00', new Options(hourCycle: $test));
    expect((string) $locale)->toBe($expect);

    $locale = new Locale('en-u-hc-h12', new Options(hourCycle: $test));
    expect((string) $locale)->toBe($expect);

    $locale = new Locale('en-u-hc-h99', new Options(hourCycle: $test));
    expect($locale->hourCycle)->toBe($expected);
})->with($validHourCycleOptions);
