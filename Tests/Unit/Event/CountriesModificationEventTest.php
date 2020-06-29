<?php
declare(strict_types=1);

use Brotkrueml\FormCountrySelect\Event\CountriesModificationEvent;
use PHPUnit\Framework\TestCase;

class CountriesModificationEventTest extends TestCase
{
    /**
     * @test
     */
    public function gettersReturnCorrectValuesSetByConstructor(): void
    {
        $countries = [
            'DE' => 'Germany',
            'US' => 'United States',
        ];
        $formIdentifier = 'some-identifier';
        $languageTwoLetterIsoCode = 'cd';

        $subject = new CountriesModificationEvent($countries, $formIdentifier, $languageTwoLetterIsoCode);

        self::assertSame($countries, $subject->getCountries());
        self::assertSame($formIdentifier, $subject->getFormIdentifier());
        self::assertSame($languageTwoLetterIsoCode, $subject->getLanguageTwoLetterIsoCode());
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
            'some-identifier',
            'en'
        );

        $countries = [
            'DK' => 'Denmark',
            'UK' => 'United Kingdom',
        ];

        $subject->setCountries($countries);

        self::assertSame($countries, $subject->getCountries());
    }
}
