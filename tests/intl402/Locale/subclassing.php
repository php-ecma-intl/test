<?php

declare(strict_types=1);

use Ecma\Intl\Locale;

readonly class CustomLocale extends Locale
{
    public bool $isCustom;

    public function __construct(string $locale)
    {
        parent::__construct($locale);
        $this->isCustom = true;
    }
}

$locale = new CustomLocale('de');

it('allows subclassing')
    ->expect($locale->isCustom)
    ->toBeTrue()
    ->and((string) $locale)
    ->toBe('de');
