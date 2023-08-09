<?php

declare(strict_types=1);

use Ecma\Intl\Locale;
use Ecma\Intl\Locale\Options;

$validScriptOptions = [
    [null, null],
    ['bali', 'Bali'],
    ['Bali', 'Bali'],
    ['bALI', 'Bali'],
    [newStringable('Brai'), 'Brai'],
];

it('sets script options on the locale', function (
    Stringable | string | null $script,
    ?string $expected,
): void {
    $expect = $expected ? 'en-' . $expected : 'en';
    $locale = new Locale('en', new Options(script: $script));
    expect((string) $locale)->toBe($expect);

    $expect = ($expected ? 'en-' . $expected : 'en') . '-DK';
    $locale = new Locale('en-DK', new Options(script: $script));
    expect((string) $locale)->toBe($expect);

    $expect = newStringable($expected ? 'en-' . $expected : 'en-Cyrl');
    $locale = new Locale('en-Cyrl', new Options(script: $script));
    expect((string) $locale)->toBe((string) $expect);
})->with($validScriptOptions);
