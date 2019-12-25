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
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Object\ObjectManager;
use TYPO3\CMS\Extbase\SignalSlot\Dispatcher;
use TYPO3\CMS\Extbase\SignalSlot\Exception\InvalidSlotException;
use TYPO3\CMS\Extbase\SignalSlot\Exception\InvalidSlotReturnException;
use TYPO3\CMS\Form\Domain\Model\FormElements\GenericFormElement;

final class CountrySelect extends GenericFormElement
{
    public function initializeFormElement()
    {
        $options = $this->getCountryOptions();

        $signalSlotDispatcher = GeneralUtility::makeInstance(ObjectManager::class)->get(Dispatcher::class);
        try {
            list($options) = $signalSlotDispatcher->dispatch(
                __CLASS__,
                'modifyOptions',
                [$options]
            );
        } catch (InvalidSlotException | InvalidSlotReturnException $e) {
        }

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
