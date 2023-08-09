<?php

declare(strict_types=1);

use Ecma\Intl\Locale;
use Ecma\Intl\Locale\Options;

$invalidNumberingSystemOptions = [
    '',
    'a',
    'ab',
    'abcdefghi',
    'abc-abcdefghi',
    '!invalid!',
    '-latn-',
    'latn-',
    'latn--',
    'latn-ca',
    'latn-ca-',
    'latn-ca-gregory',
];

it('throws ValueError for invalid numberingSystem options', function (string $test): void {
    expect(fn () => new Locale('en', new Options(numberingSystem: $test)))
        ->toThrow(ValueError::class);
})->with($invalidNumberingSystemOptions);
