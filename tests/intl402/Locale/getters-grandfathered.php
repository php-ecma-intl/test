<?php

declare(strict_types=1);

use Ecma\Intl\Locale;

it('verifies getters with grandfathered tags for "cel-gaulish"', function (): void {
    $loc = new Locale('cel-gaulish');

    expect($loc->baseName)
        ->toBe('xtg')
        ->and($loc->language)
        ->toBe('xtg')
        ->and($loc->script)
        ->toBeNull()
        ->and($loc->region)
        ->toBeNull();
});
