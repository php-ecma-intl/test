<?php

declare(strict_types=1);

use Ecma\Intl\Locale;
use Ecma\Intl\Locale\Options;

it('returns "en" for null script with "en" locale')
    ->expect((string) new Locale('en', new Options(script: null)))
    ->toBe('en');

it('returns "en-DK" for null script with "en-DK" locale')
    ->expect((string) new Locale('en-DK', new Options(script: null)))
    ->toBe('en-DK');

it('returns "en-Cyrl" for null script with "en-Cyrl" locale')
    ->expect((string) new Locale('en-Cyrl', new Options(script: null)))
    ->toBe('en-Cyrl');
