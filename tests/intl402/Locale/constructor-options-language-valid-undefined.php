<?php

declare(strict_types=1);

use Ecma\Intl\Locale;
use Ecma\Intl\Locale\Options;

it('returns "en" when language is undefined (i.e., null)')
    ->expect((string) new Locale('en', new Options(language: null)))
    ->toBe('en');

it('returns "en-US" when language is undefined (i.e., null)')
    ->expect((string) new Locale('en-US', new Options(language: null)))
    ->toBe('en-US');

it('throws ValueError when subtag fails to match production type', function (): void {
    expect(fn () => new Locale('en-els', new Options(language: null)))
        ->toThrow(ValueError::class);
});
