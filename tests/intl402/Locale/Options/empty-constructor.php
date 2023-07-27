<?php

declare(strict_types=1);

use Ecma\Intl\Locale\Options;

$emptyOptions = new Options();

it('constructs an object with all properties set to null')
    ->expect($emptyOptions->calendar)
    ->toBeNull()
    ->and($emptyOptions->caseFirst)
    ->toBeNull()
    ->and($emptyOptions->collation)
    ->toBeNull()
    ->and($emptyOptions->hourCycle)
    ->toBeNull()
    ->and($emptyOptions->language)
    ->toBeNull()
    ->and($emptyOptions->numberingSystem)
    ->toBeNull()
    ->and($emptyOptions->numeric)
    ->toBeNull()
    ->and($emptyOptions->region)
    ->toBeNull()
    ->and($emptyOptions->script)
    ->toBeNull();

it('serializes to an empty JSON object')
    ->expect(json_encode($emptyOptions))
    ->toBe('{}');
