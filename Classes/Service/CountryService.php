<?php
declare(strict_types=1);

namespace Brotkrueml\FormCountrySelect\Service;

/*
 * This file is part of the "form_country_select" extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 */

use Brotkrueml\FormCountrySelect\Domain\Model\FormElements\CountrySelect;
use Brotkrueml\FormCountrySelect\Event\CountriesModificationEvent;
use Symfony\Component\Intl\Countries;
use TYPO3\CMS\Core\EventDispatcher\EventDispatcher;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Core\Utility\VersionNumberUtility;
use TYPO3\CMS\Extbase\Object\ObjectManager;
use TYPO3\CMS\Extbase\SignalSlot\Dispatcher;

/**
 * @api
 */
final class CountryService
{
    public function getCountries(string $languageTwoLetterIsoCode = 'en', string $identifier = ''): array
    {
        $objectManager = GeneralUtility::makeInstance(ObjectManager::class);

        $countries = Countries::getNames($languageTwoLetterIsoCode);
        $event = new CountriesModificationEvent($countries, $identifier, $languageTwoLetterIsoCode);

        if (VersionNumberUtility::convertVersionNumberToInteger(TYPO3_branch) >= 10000000) {
            $eventDispatcher = $objectManager->get(EventDispatcher::class);
            $event = $eventDispatcher->dispatch($event);
        }

        $signalSlotDispatcher = $objectManager->get(Dispatcher::class);
        $signalSlotDispatcher->dispatch(CountrySelect::class, 'modifyCountries', [$event]);

        return $event->getCountries();
    }
}
