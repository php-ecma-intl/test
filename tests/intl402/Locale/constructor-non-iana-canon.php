<?php

declare(strict_types=1);

use Ecma\Intl;
use Ecma\Intl\Locale;

// Test some language tags where we know that either CLDR or ICU produce
// different results compared to the canonicalization specified in RFC 5646.
$testData = [
    [
        'tag' => 'mo',
        'canonical' => 'ro',
        'maximized' => 'ro-Latn-RO',
        'minimized' => 'ro',
    ],
    [
        'tag' => 'es-ES-preeuro',
        'canonical' => 'es-ES-preeuro',
        'maximized' => 'es-Latn-ES-preeuro',
        'minimized' => 'es-preeuro',
    ],
    [
        'tag' => 'uz-UZ-cyrillic',
        'canonical' => 'uz-UZ-cyrillic',
        'maximized' => 'uz-Latn-UZ-cyrillic',
        'minimized' => 'uz-cyrillic',
    ],
    [
        'tag' => 'posix',
        'canonical' => 'posix',
        'maximized' => 'posix',
        'minimized' => 'posix',
    ],
    [
        'tag' => 'hi-direct',
        'canonical' => 'hi-direct',
        'maximized' => 'hi-Deva-IN-direct',
        'minimized' => 'hi-direct',
    ],
    [
        'tag' => 'zh-pinyin',
        'canonical' => 'zh-pinyin',
        'maximized' => 'zh-Hans-CN-pinyin',
        'minimized' => 'zh-pinyin',
    ],
    [
        'tag' => 'zh-stroke',
        'canonical' => 'zh-stroke',
        'maximized' => 'zh-Hans-CN-stroke',
        'minimized' => 'zh-stroke',
    ],
    [
        'tag' => 'aar-x-private',
        // "aar" should be canonicalized into "aa" because "aar" matches the type attribute of
        // a languageAlias element in
        // https://www.unicode.org/repos/cldr/trunk/common/supplemental/supplementalMetadata.xml
        'canonical' => 'aa-x-private',
        'maximized' => 'aa-Latn-ET-x-private',
        'minimized' => 'aa-x-private',
    ],
    [
        'tag' => 'heb-x-private',
        // "heb" should be canonicalized into "he" because "heb" matches the type attribute of
        // a languageAlias element in
        // https://www.unicode.org/repos/cldr/trunk/common/supplemental/supplementalMetadata.xml
        'canonical' => 'he-x-private',
        'maximized' => 'he-Hebr-IL-x-private',
        'minimized' => 'he-x-private',
    ],
    [
        'tag' => 'de-u-kf',
        'canonical' => 'de-u-kf',
        'maximized' => 'de-Latn-DE-u-kf',
        'minimized' => 'de-u-kf',
    ],
    [
        'tag' => 'ces',
        // "ces" should be canonicalized into "cs" because "ces" matches the type attribute of
        // a languageAlias element in
        // https://www.unicode.org/repos/cldr/trunk/common/supplemental/supplementalMetadata.xml
        'canonical' => 'cs',
        'maximized' => 'cs-Latn-CZ',
        'minimized' => 'cs',
    ],
    [
        'tag' => 'hy-arevela',
        'canonical' => 'hy',
        'maximized' => 'hy-Armn-AM',
        'minimized' => 'hy',
    ],
    [
        'tag' => 'hy-arevmda',
        'canonical' => 'hyw',
        'maximized' => Intl::ICU_VERSION >= '73.1' ? 'hyw-Armn-AM' : 'hyw',
        'minimized' => 'hyw',
    ],
];

it('canonicalizes, maximizes, and minimizes specific tags', function (
    string $tag,
    string $canonical,
    string $maximized,
    string $minimized,
) {
    expect((string) new Locale($tag))
        ->toBe($canonical)
        ->and((string) (new Locale($tag))->maximize())
        ->toBe($maximized)
        ->and((string) (new Locale($tag))->minimize())
        ->toBe($minimized);
})->with($testData);
