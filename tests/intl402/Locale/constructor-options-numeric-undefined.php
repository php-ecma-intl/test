<?php

declare(strict_types=1);

use Ecma\Intl\Locale;
use Ecma\Intl\Locale\Options;

$options = new Options(numeric: null);

it('returns "en" when numeric is undefined (i.e., null)')
    ->expect((string) new Locale('en', $options))
    ->toBe('en');

it('returns "en-u-kn" when numeric is undefined (i.e., null)')
    ->expect((string) new Locale('en-u-kn-true', $options))
    ->toBe('en-u-kn');

it('numeric property is false when option is undefined (i.e., null)')
    ->expect((new Locale('en-u-kf-lower', $options))->numeric)
    ->toBeFalse();
