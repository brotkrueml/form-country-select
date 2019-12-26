<?php
declare(strict_types=1);

namespace Brotkrueml\FormCountrySelect\Event;

/*
 * This file is part of the "form_country_select" extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 */

final class CountriesModificationEvent
{
    /**
     * @var array
     */
    private $countries;

    /**
     * @var string
     */
    private $formIdentifier;

    public function __construct(array $countries, string $formIdentifier)
    {
        $this->countries = $countries;
        $this->formIdentifier = $formIdentifier;
    }

    public function getCountries(): array
    {
        return $this->countries;
    }

    public function getFormIdentifier(): string
    {
        return $this->formIdentifier;
    }

    /**
     * Set the countries. This should be an array in format:
     * [
     *    'DE' => 'Germany',
     *    'US' => 'United States',
     * ]
     * @param array $countries
     */
    public function setCountries(array $countries): void
    {
        $this->countries = $countries;
    }
}
