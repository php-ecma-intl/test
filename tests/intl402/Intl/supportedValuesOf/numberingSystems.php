<?php

declare(strict_types=1);

use Ecma\Intl;
use Ecma\Intl\Category;

$numberingSystems = Intl::supportedValuesOf(Category::NumberingSystem);

it('returns an array')
    ->expect($numberingSystems)
    ->toBeArray();

it('sorts the array')
    ->expect(function (): array {
        $otherNumberingSystems = Intl::supportedValuesOf(Category::NumberingSystem);
        sort($otherNumberingSystems);

        return $otherNumberingSystems;
    })
    ->toBe($numberingSystems);

it("doesn't contain duplicates")
    ->expect(array_unique(Intl::supportedValuesOf(Category::NumberingSystem)))
    ->toHaveCount(count($numberingSystems));

it("matches the 'type' production")
    ->with($numberingSystems)
    ->expect(fn (string $numberingSystem): string => $numberingSystem)
    ->toMatch(TYPE_PRODUCTION_PATTERN);
