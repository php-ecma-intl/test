<?php

declare(strict_types=1);

use Ecma\Intl\Locale;

$langtag = "de-latn-de-u-ca-gregory-co-phonebk-hc-h23-kf-true-kn-false-nu-latn";
$loc = new Locale($langtag);

test('all getters return the expected results')
    ->expect((string) $loc)
    ->toBe('de-Latn-DE-u-ca-gregory-co-phonebk-hc-h23-kf-kn-false-nu-latn')
    ->and($loc->baseName)->toBe('de-Latn-DE')
    ->and($loc->calendar)->toBe('gregory')
    ->and($loc->caseFirst)->toBe('')
    ->and($loc->collation)->toBe('phonebk')
    ->and($loc->hourCycle)->toBe('h23')
    ->and($loc->language)->toBe('de')
    ->and($loc->numberingSystem)->toBe('latn')
    ->and($loc->numeric)->toBeFalse()
    ->and($loc->region)->toBe('DE')
    ->and($loc->script)->toBe('Latn');
