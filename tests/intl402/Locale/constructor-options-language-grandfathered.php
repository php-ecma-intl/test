<?php

declare(strict_types=1);

use Ecma\Intl\Locale;
use Ecma\Intl\Locale\Options;

it('throws ValueError when language matches the grandfathered production', function (): void {
    expect(fn () => new Locale('nb', new Options(language: 'no-bok')))
        ->toThrow(ValueError::class)
        ->and(fn () => new Locale('nb', new Options(language: 'no-bok', region: 'NO')))
        ->toThrow(ValueError::class);
});

