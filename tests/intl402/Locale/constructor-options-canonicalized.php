<?php

declare(strict_types=1);

use Ecma\Intl\Locale;
use Ecma\Intl\Locale\Options;

$keyValueTests = [
    [
        'key' => 'ca',
        'option' => 'calendar',
        'tests' => [
            ['islamicc', 'islamic-civil'],
            ['ethiopic-amete-alem', 'ethioaa'],
        ],
    ],
];

it('converts values provided as options to canonical form', function (
    string $key,
    string $option,
    array $tests,
) {
    foreach ($tests as $test) {
        [$noncanonical, $canonical] = $test;

        $canonicalInLocale = new Locale("en-u-$key-$canonical");

        expect($canonicalInLocale->{$option})
            ->toBe($canonical);

        $canonicalInOption = new Locale('en', new Options(...[$option => $canonical]));

        expect($canonicalInOption->{$option})
            ->toBe($canonical);

        $noncanonicalInLocale = new Locale("en-u-$key-$noncanonical");

        expect($noncanonicalInLocale->{$option})
            ->toBe($canonical);

        $noncanonicalInOption = new Locale('en', new Options(...[$option => $noncanonical]));

        expect($noncanonicalInOption->{$option})
            ->toBe($canonical);
    }
})->with($keyValueTests);
