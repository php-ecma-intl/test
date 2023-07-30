<?php

declare(strict_types=1);

use Ecma\Intl\Locale;
use Ecma\Intl\Locale\Options;

// ApplyOptionsToTag canonicalises the locale identifier before applying the
// options. That means "und-Armn-SU" is first canonicalised to "und-Armn-AM",
// then the language is changed to "ru". If "ru" were applied first, the result
// would be "ru-Armn-RU" instead.
it('canonicalizes the locale identifier before applying the options')
    ->expect((string) (new Locale('und-Armn-SU', new Options(language: 'ru'))))
    ->toBe('ru-Armn-AM');
