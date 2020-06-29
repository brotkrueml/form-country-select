<?php
declare(strict_types=1);

use Brotkrueml\FormCountrySelect\Event\CountriesModificationEvent;
use PHPUnit\Framework\TestCase;

class CountriesModificationEventTest extends TestCase
{
    /**
     * @test
     */
    public function getterReturnCorrectValuesSetByConstructor(): void
    {
        $countries = [
            'DE' => 'Germany',
            'US' => 'United States',
        ];
        $formIdentifier = 'some-identifier';

        $subject = new CountriesModificationEvent($countries, $formIdentifier);

        self::assertSame($countries, $subject->getCountries());
        self::assertSame($formIdentifier, $subject->getFormIdentifier());
    }

    /**
     * @test
     */
    public function setCountriesIsImplementedCorrectly(): void
    {
        $subject = new CountriesModificationEvent(
            [
                'DE' => 'Germany',
                'US' => 'United States',
            ],
            'some-identifier'
        );

        $countries = [
            'DK' => 'Denmark',
            'UK' => 'United Kingdom',
        ];

        $subject->setCountries($countries);

        self::assertSame($countries, $subject->getCountries());
    }
}
