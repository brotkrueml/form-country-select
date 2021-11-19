<?php

declare(strict_types=1);

/*
 * This file is part of the "form_country_select" extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 */

namespace Brotkrueml\FormCountrySelect\Event;

final class CountriesModificationEvent
{
    /**
     * @var array<string, string>
     */
    private $countries;

    /**
     * @var string
     */
    private $formIdentifier;

    /**
     * @var string
     */
    private $languageTwoLetterIsoCode;

    /**
     * @param array<string, string> $countries
     */
    public function __construct(array $countries, string $formIdentifier, string $languageTwoLetterIsoCode)
    {
        $this->countries = $countries;
        $this->formIdentifier = $formIdentifier;
        $this->languageTwoLetterIsoCode = $languageTwoLetterIsoCode;
    }

    /**
     * @return array<string, string>
     */
    public function getCountries(): array
    {
        return $this->countries;
    }

    public function getFormIdentifier(): string
    {
        return $this->formIdentifier;
    }

    public function getLanguageTwoLetterIsoCode(): string
    {
        return $this->languageTwoLetterIsoCode;
    }

    /**
     * Set the countries. This should be an array in format:
     * [
     *    'DE' => 'Germany',
     *    'US' => 'United States',
     * ]
     * @param array<string, string> $countries
     */
    public function setCountries(array $countries): void
    {
        $this->countries = $countries;
    }
}
