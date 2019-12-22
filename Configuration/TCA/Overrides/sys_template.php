<?php
defined('TYPO3_MODE') || die();

(function ($extensionKey = 'form_country_select') {
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile(
        $extensionKey,
        'Configuration/TypoScript',
        'Form Country Select'
    );
})();
