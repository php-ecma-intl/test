<?php

declare(strict_types=1);

use Ecma\Intl\Locale;
use Ecma\Intl\Locale\Options;

// language      = 2*3ALPHA            ; shortest ISO 639 code
//                 ["-" extlang]       ; sometimes followed by
//                                     ; extended language subtags
//               / 4ALPHA              ; or reserved for future use
//               / 5*8ALPHA            ; or registered language subtag
//
// extlang       = 3ALPHA              ; selected ISO 639 codes
//                 *2("-" 3ALPHA)      ; permanently reserved
$invalidLanguageOptions = [
    '',
    'a',
    'ab7',
    'notalanguage',
    'undefined',

    // Value contains more than just the 'language' production.
    'fr-Latn',
    'fr-FR',
    'sa-vaidika',
    'fr-a-asdf',
    'fr-x-private',

    // Irregular grandfathered language tag.
    'i-klingon',

    // Regular grandfathered language tag.
    'zh-min',
    'zh-min-nan',

    // Reserved with extended language subtag
    'abcd-US',
    'abcde-US',
    'abcdef-US',
    'abcdefg-US',
    'abcdefgh-US',
];

it('throws ValueError for invalid language options', function (string | null $test): void {
    expect(fn () => new Locale('en', new Options(language: $test)))
        ->toThrow(ValueError::class);
})->with($invalidLanguageOptions);
