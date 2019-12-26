<?php
declare(strict_types=1);

namespace Brotkrueml\FormCountrySelect\Domain\Model\FormElements;

/*
 * This file is part of the "form_country_select" extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 */

use Brotkrueml\FormCountrySelect\Event\CountriesModificationEvent;
use Symfony\Component\Intl\Countries;
use TYPO3\CMS\Core\EventDispatcher\EventDispatcher;
use TYPO3\CMS\Core\Site\Entity\SiteLanguage;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Core\Utility\VersionNumberUtility;
use TYPO3\CMS\Extbase\Object\ObjectManager;
use TYPO3\CMS\Extbase\SignalSlot\Dispatcher;
use TYPO3\CMS\Form\Domain\Model\FormDefinition;
use TYPO3\CMS\Form\Domain\Model\FormElements\GenericFormElement;
use TYPO3\CMS\Form\Domain\Model\Renderable\RenderableInterface;

final class CountrySelect extends GenericFormElement
{
    public function initializeFormElement()
    {
        $objectManager = GeneralUtility::makeInstance(ObjectManager::class);

        $countries = $this->getCountries();
        $formIdentifier = $this->getFormIdentifier($this->getParentRenderable());

        $event = new CountriesModificationEvent($countries, $formIdentifier);

        if (VersionNumberUtility::convertVersionNumberToInteger(TYPO3_branch) >= 10000000) {
            $eventDispatcher = $objectManager->get(EventDispatcher::class);
            $event = $eventDispatcher->dispatch($event);
        }

        $signalSlotDispatcher = $objectManager->get(Dispatcher::class);
        $signalSlotDispatcher->dispatch(__CLASS__, 'modifyCountries', [$event]);

        $this->setProperty('options', $event->getCountries());
    }

    private function getCountries(): array
    {
        $languageTwoLetterIsoCode = $this->getSiteLanguage()->getTwoLetterIsoCode();

        return Countries::getNames($languageTwoLetterIsoCode);
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
