<?php

declare(strict_types=1);

use Ecma\Intl\Locale;
use Ecma\Intl\Locale\Options;

$invalidCollationOptions = [
    '',
    'a',
    'ab',
    'abcdefghi',
    'abc-abcdefghi',
];

it('throws ValueError for invalid collation options', function (string $test): void {
    expect(fn () => new Locale('en', new Options(collation: $test)))
        ->toThrow(ValueError::class);
})->with($invalidCollationOptions);
