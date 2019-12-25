<?php
defined('TYPO3_MODE') || die();

(function ($extensionKey = 'form_country_select') {
    $iconRegistry = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(
        \TYPO3\CMS\Core\Imaging\IconRegistry::class
    );

    $iconRegistry->registerIcon(
        'form-country-select',
        \TYPO3\CMS\Core\Imaging\IconProvider\SvgIconProvider::class,
        ['source' => 'EXT:' . $extensionKey . '/Resources/Public/Icons/form-country-select.svg']
    );

    $GLOBALS['TYPO3_CONF_VARS']['SYS']['locallangXMLOverride']['EXT:form/Resources/Private/Language/Database.xlf'][]
        = 'EXT:' . $extensionKey . '/Resources/Private/Language/Backend.xlf';
})();
