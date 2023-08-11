<?php

declare(strict_types=1);

use Ecma\Intl\Locale;

it('throws ValueError for invalid language tags', function (string $tag): void {
    expect(fn () => new Locale($tag))
        ->toThrow(ValueError::class);
})->with(getInvalidLanguageTags());
