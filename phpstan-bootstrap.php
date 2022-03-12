<?php

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
