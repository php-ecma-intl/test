<?php

declare(strict_types=1);

use Ecma\Intl\Locale;

$irregularGrandfathered = [
    'en-GB-oed',
    'i-ami',
    'i-bnn',
    'i-default',
    'i-enochian',
    'i-hak',
    'i-klingon',
    'i-lux',
    'i-mingo',
    'i-navajo',
    'i-pwn',
    'i-tao',
    'i-tay',
    'i-tsu',
    'sgn-BE-FR',
    'sgn-BE-NL',
    'sgn-CH-DE',
];

it('throws ValueError for specific irregular grandfathered tags', function (string $tag): void {
    expect(fn () => new Locale($tag))
        ->toThrow(ValueError::class);
})->with($irregularGrandfathered);

$regularGrandfathered = [
    [
        'tag' => 'art-lojban',
        'canonical' => 'jbo',
        'maximized' => 'jbo-Latn-001',
        'minimized' => 'jbo',
    ],
    [
        'tag' => 'cel-gaulish',
        'canonical' => 'xtg',
        'maximized' => 'xtg',
        'minimized' => 'xtg',
    ],
    [
        'tag' => 'zh-guoyu',
        'canonical' => 'zh',
        'maximized' => 'zh-Hans-CN',
        'minimized' => 'zh',
    ],
    [
        'tag' => 'zh-hakka',
        'canonical' => 'hak',
        'maximized' => 'hak-Hans-CN',
        'minimized' => 'hak',
    ],
    [
        'tag' => 'zh-xiang',
        'canonical' => 'hsn',
        'maximized' => 'hsn-Hans-CN',
        'minimized' => 'hsn',
    ],
];

it('maximizes and minimizes specific grandfathered tags', function (
    string $tag,
    string $canonical,
    string $maximized,
    string $minimized,
): void {
    $loc = new Locale($tag);

    expect((string) $loc)
        ->toBe($canonical)
        ->and((string) $loc->maximize())
        ->toBe($maximized)
        ->and((string) $loc->maximize()->maximize())
        ->toBe($maximized)
        ->and((string) $loc->minimize())
        ->toBe($minimized)
        ->and((string) $loc->minimize())
        ->toBe($minimized)
        ->and((string) $loc->maximize()->minimize())
        ->toBe($minimized)
        ->and((string) $loc->minimize()->maximize())
        ->toBe($maximized);
})->with($regularGrandfathered);

$regularGrandfatheredWithExtLang = [
    'no-bok',
    'no-nyn',
    'zh-min',
    'zh-min-nan',
];

it('throws ValueError for specific regular grandfathered tags with ext lang', function (string $tag): void {
    expect(fn () => new Locale($tag))
        ->toThrow(ValueError::class);
})->with($regularGrandfatheredWithExtLang);

$extras = [
    'fonipa',
    'a-not-assigned',
    'u-attr',
    'u-co',
    'u-co-phonebk',
    'x-private',
];

it('produces the expected result with variants, extensions, and private use subtags', function (
    string $tag,
    string $canonical,
) use ($extras): void {
    $priv = '-x-0';
    $tagMax = substr((string) (new Locale($canonical . $priv))->maximize(), 0, strlen($priv) * -1);
    $tagMin = substr((string) (new Locale($canonical . $priv))->minimize(), 0, strlen($priv) * -1);

    foreach ($extras as $extra) {
        $loc = new Locale($tag . '-' . $extra);
        $canonicalWithExtra = $canonical . '-' . $extra;
        $canonicalMax = $tagMax . '-' . $extra;
        $canonicalMin = $tagMin . '-' . $extra;

        if (preg_match('/^[a-z0-9]{5,8}|[0-9][a-z0-9]{3}$/i', $extra)) {
            $sorted = fn ($s) => preg_replace_callback(
                '/(-([a-z0-9]{5,8}|[0-9][a-z0-9]{3}))+$/i',
                function (array $m): string {
                    $match = explode('-', $m[0]);
                    sort($match);

                    return implode('-', $match);
                },
                $s,
            );

            $canonicalWithExtra = $sorted($canonicalWithExtra);
            $canonicalMax = $sorted($canonicalMax);
            $canonicalMin = $sorted($canonicalMin);
        }

        // Adding extra subtags to grandfathered tags can have "interesting" results. Take for
        // example "art-lojban" when "fonipa" is added, so we get "art-lojban-fonipa". The first
        // step when canonicalising the language tag is to bring it in 'canonical syntax', that
        // means among other things sorting variants in alphabetical order. So "art-lojban-fonipa"
        // is transformed to "art-fonipa-lojban", because "fonipa" is sorted before "lojban". And
        // only after that has happened, we replace aliases with their preferred form.
        //
        // Now the usual problems arise when doing silly things like adding subtags to
        // grandfathered subtags, nobody, neither RFC 5646 nor UTS 35, provides a clear description
        // what needs to happen next.
        //
        // From <http://unicode.org/reports/tr35/#Language_Tag_to_Locale_Identifier>:
        //
        // > A valid [BCP47] language tag can be converted to a valid Unicode BCP 47 locale
        // > identifier according to Annex C. LocaleId Canonicalization
        //
        // From <http://unicode.org/reports/tr35/#LocaleId_Canonicalization>
        // > The languageAlias, scriptAlias, territoryAlias, and variantAlias elements are used
        // > as rules to transform an input source localeId. The first step is to transform the
        // > languageId portion of the localeId.
        //
        // For regular grandfathered tags, "lojban", "gaulish", "guoyu", "hakka", and "xiang" will
        // therefore be considered as the "variant" subtag and be replaced by rules in languageAlias.
        //
        // Not all language tag processor will pass this test, for example because they don't order
        // variant subtags in alphabetical order or they're too eager when detecting grandfathered
        // tags. For example "zh-hakka-hakka" is accepted in some language tag processors, because
        // the language tag starts with a prefix which matches a grandfathered tag, and that prefix
        // is then canonicalised to "hak" and the second "hakka" is simply appended to it, so the
        // resulting tag is "hak-hakka". This is clearly wrong as far as ECMA-402 compliance is
        // concerned, because language tags are parsed and validated before any canonicalisation
        // happens. And during the validation step an error should be emitted, because the input
        // "zh-hakka-hakka" contains two identical variant subtags.
        //
        // From <https://tc39.es/ecma402/#sec-isstructurallyvalidlanguagetag>:
        //
        // > does not include duplicate variant subtags
        //
        // So, if your implementation fails this assertion, but you still like to test the rest of
        // this file, a pull request to split this file seems the way to go!

        expect((string) $loc)
            ->toBe($canonicalWithExtra)
            ->and((string) $loc->maximize())
            ->toBe($canonicalMax)
            ->and((string) $loc->maximize()->maximize())
            ->toBe($canonicalMax)
            ->and((string) $loc->minimize())
            ->toBe($canonicalMin)
            ->and((string) $loc->minimize()->minimize())
            ->toBe($canonicalMin)
            ->and((string) $loc->maximize()->minimize())
            ->toBe($canonicalMin)
            ->and((string) $loc->minimize()->maximize())
            ->toBe($canonicalMax);
    }
})->with($regularGrandfathered);
