<?php

declare(strict_types=1);

use Ecma\Intl\Locale;
use Ecma\Intl\Locale\Options;

$tests = [
    [
        'locale' => new Locale('en'),
        'expected' => ['gregory'],
    ],
    [
        'locale' => new Locale('en', new Options(calendar: 'buddhist')),
        'expected' => ['buddhist'],
    ],
    [
        'locale' => new Locale('zh'),
        'expected' => ['gregory', 'chinese'],
    ],
    [
        'locale' => new Locale('jp'),
        'expected' => ['gregory'],
    ],
    [
        'locale' => new Locale('jp-JP'),
        'expected' => ['gregory', 'japanese'],
    ],
    [
        'locale' => new Locale('jp-JP', new Options(calendar: 'japanese')),
        'expected' => ['japanese'],
    ],
    [
        'locale' => new Locale('und-Thai'),
        'expected' => ['buddhist', 'gregory'],
    ],
];

it('returns expected calendars values', function (
    Locale $locale,
    array $expected,
): void {
    expect($locale->calendars)
        ->toBe($expected)
        ->and($locale->getCalendars())
        ->toBe($locale->calendars);
})->with($tests);
