<?php

declare(strict_types=1);

use Ecma\Intl;

$locale = 'it-u-nu-latn-ca-gregory';

// RFC 6067: The canonical order of keywords is in US-ASCII order by key.
$sorted = 'it-u-ca-gregory-nu-latn';

// This test might not be relevant anymore. It is based on this from Test262:
// https://github.com/tc39/test262/blob/f5c932144a27f6c572b5a4902b7a22176a18535a/test/intl402/Intl/getCanonicalLocales/canonicalized-unicode-ext-seq.js
it('may sort keywords in US-ASCII order by key')
    ->expect(fn (): array => Intl::getCanonicalLocales($locale))
    ->toHaveCount(1)
    ->toBeIn([
        [$locale],
        [$sorted],
    ]);
