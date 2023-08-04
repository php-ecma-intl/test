<?php

declare(strict_types=1);

use Ecma\Intl\Locale;
use Ecma\Intl\Locale\Options;

$invalidCaseFirstOptions = [
    '',
    'u',
    'Upper',
    'Lower',
    'upper ',
    'uppercase',
    ' lower',
    'true',
];

it('throws ValueError for invalid caseFirst options', function (string $test): void {
    expect(fn () => new Locale('en', new Options(caseFirst: $test)))
        ->toThrow(ValueError::class);
})->with($invalidCaseFirstOptions);

it('throws TypeError for boolean true', function (): void {
    expect(fn () => new Locale('en', new Options(caseFirst: true)))
        ->toThrow(TypeError::class);
});
