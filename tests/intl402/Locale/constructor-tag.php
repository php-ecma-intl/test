<?php

declare(strict_types=1);

use Ecma\Intl\Locale;

$validLanguageTags = [
    ['eN', 'en'],
    ['en-gb', 'en-GB'],
    ['IT-LATN-iT', 'it-Latn-IT'],
    ['th-th-u-nu-thai', 'th-TH-u-nu-thai'],
    ['en-x-u-foo', 'en-x-u-foo'],
    ['en-a-bar-x-u-foo', 'en-a-bar-x-u-foo'],
    ['en-x-u-foo-a-bar', 'en-x-u-foo-a-bar'],
    ['en-u-baz-a-bar-x-u-foo', 'en-a-bar-u-baz-x-u-foo'],
    ['DE-1996', 'de-1996'], // unicode_language_subtag sep unicode_variant_subtag

    // unicode_language_subtag (sep unicode_variant_subtag)*
    ['sl-ROZAJ-BISKE-1994', 'sl-1994-biske-rozaj'],
    ['zh-latn-pinyin-pinyin2', 'zh-Latn-pinyin-pinyin2'],
];

it('canonicalizes specific tags', function (
    string $tag,
    string $canonical,
) {
    expect((string) new Locale($canonical))
        ->toBe($canonical)
        ->and((string) new Locale($tag))
        ->toBe($canonical);
})->with($validLanguageTags);

// unicode_language_subtag = alpha{2,3} | alpha{5,8};
$invalidLanguageTags = [
    'X-u-foo',
    'Flob',
    'ZORK',
    'Blah-latn',
    'QuuX-latn-us',
    'SPAM-gb-x-Sausages-BACON-eggs',
];

it('throws ValueError for invalid tag', function (string $tag): void {
    expect(fn () => new Locale($tag))
        ->toThrow(ValueError::class);
})->with($invalidLanguageTags);
