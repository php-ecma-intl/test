<?php

declare(strict_types=1);

use Ecma\Intl\Locale;

$validLanguageTags = [
    // Duplicate keywords are removed.
    ['da-u-ca-gregory-ca-buddhist', 'da-u-ca-gregory'],

    // Keywords currently used in Intl specs are reordered in US-ASCII order.
    ['zh-u-nu-hans-ca-chinese', 'zh-u-ca-chinese-nu-hans'],
    ['zh-u-ca-chinese-nu-hans', 'zh-u-ca-chinese-nu-hans'],

    // Even keywords currently not used in Intl specs are reordered in US-ASCII order.
    ['de-u-cu-eur-nu-latn', 'de-u-cu-eur-nu-latn'],
    ['de-u-nu-latn-cu-eur', 'de-u-cu-eur-nu-latn'],

    // Attributes in Unicode extensions are reordered in US-ASCII order.
    ['pt-u-attr-ca-gregory', 'pt-u-attr-ca-gregory'],
    ['pt-u-attr1-attr2-ca-gregory', 'pt-u-attr1-attr2-ca-gregory'],
    ['pt-u-attr2-attr1-ca-gregory', 'pt-u-attr1-attr2-ca-gregory'],
];

it('canonicalizes specific tags', function (string $tag, string $canonical): void {
    expect((string) new Locale($tag))
        ->toBe($canonical);
})->with($validLanguageTags);
