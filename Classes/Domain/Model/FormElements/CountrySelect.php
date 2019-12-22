<?php
declare(strict_types=1);

namespace Brotkrueml\FormCountrySelect\Domain\Model\FormElements;

/*
 * This file is part of the "form_country_select" extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 */

use Symfony\Component\Intl\Countries;
use TYPO3\CMS\Core\Site\Entity\SiteLanguage;
use TYPO3\CMS\Form\Domain\Model\FormElements\GenericFormElement;

final class CountrySelect extends GenericFormElement
{
    public function initializeFormElement()
    {
        $options = $this->getCountryOptions();

        $this->setProperty('options', $options);
    }

    private function getCountryOptions(): array
    {
        $languageTwoLetterIsoCode = $this->getSiteLanguage()->getTwoLetterIsoCode();

        return Countries::getNames($languageTwoLetterIsoCode);
    }

    private function getSiteLanguage(): SiteLanguage
    {
        return $GLOBALS['TYPO3_REQUEST']->getAttribute('language');
    }
}
