<?php

declare(strict_types=1);

/*
 * This file is part of the "form_country_select" extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 */

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
