<?php

// To avoid "Constant TYPO3_MODE not found" in CountrySelect class
define('TYPO3_MODE', 'BE');

// To avoid "Return value of TYPO3\CMS\Core\Core\Environment::isComposerMode() must be of the type bool, null returned"
// in CountryService class
TYPO3\CMS\Core\Core\Environment::initialize(
    new TYPO3\CMS\Core\Core\ApplicationContext('Testing'),
    true,
    true,
    '',
    '',
    '',
    '',
    '',
    ''
);
