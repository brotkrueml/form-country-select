<?php
defined('TYPO3') || die();

use Brotkrueml\FormCountrySelect\Extension;

$GLOBALS['TYPO3_CONF_VARS']['SYS']['locallangXMLOverride']['EXT:form/Resources/Private/Language/Database.xlf'][]
    = 'EXT:' . Extension::KEY . '/Resources/Private/Language/Backend.xlf';
