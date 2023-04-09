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
use Psr\Http\Message\ServerRequestInterface;
use TYPO3\CMS\Core\Authentication\BackendUserAuthentication;
use TYPO3\CMS\Core\Http\ApplicationType;
use TYPO3\CMS\Core\Site\Entity\SiteLanguage;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Form\Domain\Model\FormDefinition;
use TYPO3\CMS\Form\Domain\Model\FormElements\GenericFormElement;
use TYPO3\CMS\Form\Domain\Model\Renderable\CompositeRenderableInterface;

final class CountrySelect extends GenericFormElement
{
    private const DEFAULT_LANGUAGE_ISO_CODE = 'en';

    public function initializeFormElement(): void
    {
        /** @var CountryService $countryService */
        $countryService = GeneralUtility::makeInstance(CountryService::class);

        $this->setProperty('options', $countryService->getCountries(
            $this->getLanguageCode(),
            $this->getFormIdentifier($this->getParentRenderable()),
        ));
    }

    private function getFormIdentifier(?CompositeRenderableInterface $renderable): string
    {
        if ($renderable instanceof FormDefinition) {
            return $renderable->getIdentifier();
        }

        if ($renderable instanceof CompositeRenderableInterface) {
            return $this->getFormIdentifier($renderable->getParentRenderable());
        }

        return '';
    }

    private function getLanguageCode(): string
    {
        if ($this->isBackendApplicationType()) {
            $code = $this->getBackendUser()->uc['lang'];
            return $code === 'default' ? self::DEFAULT_LANGUAGE_ISO_CODE : $code;
        }

        /** @var SiteLanguage|null $siteLanguage */
        $siteLanguage = $this->getServerRequest()->getAttribute('language');
        if (! $siteLanguage instanceof SiteLanguage) {
            return self::DEFAULT_LANGUAGE_ISO_CODE;
        }

        return $siteLanguage->getTwoLetterIsoCode();
    }

    private function isBackendApplicationType(): bool
    {
        return ApplicationType::fromRequest($this->getServerRequest())->isBackend();
    }

    private function getServerRequest(): ServerRequestInterface
    {
        return $GLOBALS['TYPO3_REQUEST'];
    }

    private function getBackendUser(): BackendUserAuthentication
    {
        return $GLOBALS['BE_USER'];
    }
}
