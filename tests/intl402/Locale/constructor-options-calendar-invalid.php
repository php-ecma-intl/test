<?php

declare(strict_types=1);

use Ecma\Intl\Locale;
use Ecma\Intl\Locale\Options;

// alphanum = (ALPHA / DIGIT)     ; letters and numbers
// calendar = (3*8alphanum) *("-" (3*8alphanum))
$invalidCalendarOptions = [
    '',
    'a',
    'ab',
    'abcdefghi',
    'abc-abcdefghi',
];

it('throws ValueError for invalid calendar options', function (string $test): void {
    expect(fn () => new Locale('en', new Options(calendar: $test)))
        ->toThrow(ValueError::class);
})->with($invalidCalendarOptions);
