<?php
declare(strict_types=1);

namespace Brotkrueml\FormCountrySelect\Domain\Model\FormElements;

/*
 * This file is part of the "form_country_select" extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 */

use Brotkrueml\FormCountrySelect\Service\CountryService;
use TYPO3\CMS\Core\Site\Entity\SiteLanguage;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Form\Domain\Model\FormDefinition;
use TYPO3\CMS\Form\Domain\Model\FormElements\GenericFormElement;
use TYPO3\CMS\Form\Domain\Model\Renderable\RenderableInterface;

final class CountrySelect extends GenericFormElement
{
    public function initializeFormElement()
    {
        $countryService = GeneralUtility::makeInstance(CountryService::class);

        $this->setProperty('options', $countryService->getCountries(
            $this->getSiteLanguage()->getTwoLetterIsoCode(),
            $this->getFormIdentifier($this->getParentRenderable())
        ));
    }

    private function getFormIdentifier(RenderableInterface $renderable): string
    {
        if ($renderable instanceof FormDefinition) {
            return $renderable->getIdentifier();
        }

        return $this->getFormIdentifier($renderable->getParentRenderable());
    }

    private function getSiteLanguage(): SiteLanguage
    {
        return $GLOBALS['TYPO3_REQUEST']->getAttribute('language');
    }
}
