<?php

declare(strict_types=1);

use Ecma\Intl\Locale;

class CustomError extends RuntimeException
{
}

$throwingStringable = new class () {
    public function __toString(): string
    {
        throw new CustomError();
    }
};

$tests = [
    [fn () => new Locale($throwingStringable)],
    [fn () => new Locale('en', new Locale\Options(calendar: $throwingStringable))],
    [fn () => new Locale('en', new Locale\Options(caseFirst: $throwingStringable))],
    [fn () => new Locale('en', new Locale\Options(collation: $throwingStringable))],
    [fn () => new Locale('en', new Locale\Options(hourCycle: $throwingStringable))],
    [fn () => new Locale('en', new Locale\Options(language: $throwingStringable))],
    [fn () => new Locale('en', new Locale\Options(numberingSystem: $throwingStringable))],
    [fn () => new Locale('en', new Locale\Options(region: $throwingStringable))],
    [fn () => new Locale('en', new Locale\Options(script: $throwingStringable))],
    [fn () => new Locale('en', new Locale\Options(calendar: 'gregory', language: $throwingStringable))],
    [fn () => new Locale('en', new Locale\Options(caseFirst: 'upper', collation: $throwingStringable))],
    [fn () => new Locale('en', new Locale\Options(collation: $throwingStringable, hourCycle: 'h11'))],
];

it('propagates exceptions thrown from stringable conversion', function (
    Closure $test,
): void {
    expect($test)->toThrow(CustomError::class);
})->with($tests);
