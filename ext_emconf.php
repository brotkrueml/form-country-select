<?php
$EM_CONF[$_EXTKEY] = [
    'title' => 'Form Country Select',
    'description' => 'Form element for selecting a country from a localised list',
    'category' => 'fe',
    'author' => 'Chris Müller',
    'author_email' => 'typo3@brotkrueml.dev',
    'state' => 'obsolete',
    'version' => '3.1.0',
    'constraints' => [
        'depends' => [
            'typo3' => '12.4.0-12.4.99',
            'form' => '12.4.0-12.4.99',
        ],
        'conflicts' => [],
        'suggests' => [],
    ],
    'autoload' => [
        'psr-4' => ['Brotkrueml\\FormCountrySelect\\' => 'Classes']
    ],
];
