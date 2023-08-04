<?php

declare(strict_types=1);

use Ecma\Intl\Locale;
use Ecma\Intl\Locale\Options;

$validCaseFirstOptions = [
    'upper',
    'lower',
    'false',
    false,
];

it('sets caseFirst options on the locale', function (string | false $test): void {
    $expected = is_bool($test) ? 'false' : $test;
    $expect = "en-u-kf-$expected";

    $locale = new Locale('en', new Options(caseFirst: $test));
    expect((string) $locale)->toBe($expect);

    $locale = new Locale('en-u-kf-lower', new Options(caseFirst: $test));
    expect((string) $locale)->toBe($expect);

    $locale = new Locale('en-u-kf-upper', new Options(caseFirst: $test));
    expect($locale->caseFirst)->toBe($expected);
})->with($validCaseFirstOptions);
