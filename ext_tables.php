<?php
defined('TYPO3_MODE') || die();

(static function () {
    if ((new TYPO3\CMS\Core\Information\Typo3Version())->getMajorVersion() < 11) {
        $iconRegistry = TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(
            TYPO3\CMS\Core\Imaging\IconRegistry::class
        );
        $iconRegistry->registerIcon(
            'form-country-select',
            TYPO3\CMS\Core\Imaging\IconProvider\SvgIconProvider::class,
            ['source' => 'EXT:' . Brotkrueml\FormCountrySelect\Extension::KEY . '/Resources/Public/Icons/form-country-select.svg']
        );
    }

    $GLOBALS['TYPO3_CONF_VARS']['SYS']['locallangXMLOverride']['EXT:form/Resources/Private/Language/Database.xlf'][]
        = 'EXT:' . Brotkrueml\FormCountrySelect\Extension::KEY . '/Resources/Private/Language/Backend.xlf';
})();
