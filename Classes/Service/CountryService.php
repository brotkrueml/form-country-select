<?php

declare(strict_types=1);

/*
 * This file is part of the "form_country_select" extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 */

namespace Brotkrueml\FormCountrySelect\Service;

use Brotkrueml\FormCountrySelect\Domain\Model\FormElements\CountrySelect;
use Brotkrueml\FormCountrySelect\Event\CountriesModificationEvent;
use Brotkrueml\FormCountrySelect\Extension;
use Symfony\Component\Intl\Countries;
use TYPO3\CMS\Core\Core\Environment;
use TYPO3\CMS\Core\EventDispatcher\EventDispatcher;
use TYPO3\CMS\Core\Information\Typo3Version;
use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\SignalSlot\Dispatcher;

if (! Environment::isComposerMode() && ! \class_exists(Countries::class)) {
    // @phpstan-ignore-next-line
    @include 'phar://' . ExtensionManagementUtility::extPath(Extension::KEY) . 'Resources/Private/PHP/symfony-intl.phar/vendor/autoload.php';
}

/**
 * @api
 */
final class CountryService
{
    /**
     * @return array<string, string>
     */
    public function getCountries(string $languageTwoLetterIsoCode = 'en', string $identifier = ''): array
    {
        $countries = Countries::getNames($languageTwoLetterIsoCode);
        $event = new CountriesModificationEvent($countries, $identifier, $languageTwoLetterIsoCode);

        if ((new Typo3Version())->getMajorVersion() >= 10) {
            /** @var EventDispatcher $eventDispatcher */
            $eventDispatcher = GeneralUtility::makeInstance(EventDispatcher::class);
            /** @var CountriesModificationEvent $event */
            $event = $eventDispatcher->dispatch($event);
        }

        /** @var Dispatcher $signalSlotDispatcher */
        $signalSlotDispatcher = GeneralUtility::makeInstance(Dispatcher::class);
        $signalSlotDispatcher->dispatch(CountrySelect::class, 'modifyCountries', [$event]);

        return $event->getCountries();
    }
}
