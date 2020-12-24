<?php

declare(strict_types=1);

/*
 * This file is part of the "form_country_select" extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 */

namespace Brotkrueml\FormCountrySelect\Domain\Model\FormElements;

use Brotkrueml\FormCountrySelect\Service\CountryService;
use TYPO3\CMS\Core\Authentication\BackendUserAuthentication;
use TYPO3\CMS\Core\Http\ServerRequest;
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
            $this->getLanguageCode(),
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

    private function getLanguageCode(): string
    {
        if (TYPO3_MODE === 'BE') {
            return $this->getBackendUser()->uc['lang'];
        }

        return $this->getServerRequest()
            ->getAttribute('language')
            ->getTwoLetterIsoCode();
    }

    private function getServerRequest(): ServerRequest
    {
        return $GLOBALS['TYPO3_REQUEST'];
    }

    private function getBackendUser(): BackendUserAuthentication
    {
        return $GLOBALS['BE_USER'];
    }
}
