<?php

declare(strict_types=1);

use Ecma\Intl\Locale;
use Ecma\Intl\Locale\Options;

$tests = [
    [
        'locale' => new Locale('en'),
        'expected' => ['USD', 'USN'],
    ],
    [
        'locale' => new Locale('en', new Options(currency: 'EUR')),
        'expected' => ['EUR'],
    ],
    [
        'locale' => new Locale('zh'),
        'expected' => ['CNY', 'CNH'],
    ],
    [
        'locale' => new Locale('jp-JP'),
        'expected' => ['JPY'],
    ],
    [
        'locale' => new Locale('jp', new Options(currency: 'JPY')),
        'expected' => ['JPY'],
    ],
    [
        'locale' => new Locale('und-u-cu-cad'),
        'expected' => ['CAD'],
    ],
];

it('returns expected currencies values', function (
    Locale $locale,
    array $expected,
): void {
    expect($locale->currencies)
        ->toBe($expected)
        ->and($locale->getCurrencies())
        ->toBe($locale->currencies);
})->with($tests);
