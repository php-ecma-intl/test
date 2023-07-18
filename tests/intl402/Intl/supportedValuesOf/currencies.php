<?php

declare(strict_types=1);

use Ecma\Intl;
use Ecma\Intl\Category;

$currencies = Intl::supportedValuesOf(Category::Currency);

it('returns an array')
    ->expect($currencies)
    ->toBeArray();

it('sorts the array')
    ->expect(function (): array {
        $otherCalendars = Intl::supportedValuesOf(Category::Currency);
        sort($otherCalendars);

        return $otherCalendars;
    })
    ->toBe($currencies);

it("doesn't contain duplicates")
    ->expect(array_unique(Intl::supportedValuesOf(Category::Currency)))
    ->toHaveCount(count($currencies));

it('is a 3-letter ISO 4217 currency code')
    ->with($currencies)
    ->expect(fn (string $currency): string => $currency)
    ->toMatch(CURRENCY_PATTERN);
