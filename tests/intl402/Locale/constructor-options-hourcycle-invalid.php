<?php

declare(strict_types=1);

use Ecma\Intl\Locale;
use Ecma\Intl\Locale\Options;

$invalidHourCycleOptions = [
    '',
    'h',
    'h00',
    'h01',
    'h10',
    'h13',
    'h22',
    'h25',
    'h48',
    'h012',
    'h120',
    'h12 ',
    ' h11',
    'H12',
];

it('throws ValueError for invalid hourCycle options', function (string $test): void {
    expect(fn () => new Locale('en', new Options(hourCycle: $test)))
        ->toThrow(ValueError::class);
})->with($invalidHourCycleOptions);
