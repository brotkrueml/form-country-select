<?php
$EM_CONF[$_EXTKEY] = [
    'title' => 'Form Country Select',
    'description' => 'Form element for selecting a country',
    'category' => 'fe',
    'author' => 'Chris Müller',
    'author_email' => 'typo3@krue.ml',
    'state' => 'beta',
    'version' => '1.0.0-dev',
    'constraints' => [
        'depends' => [
            'typo3' => '9.5.0-9.5.99',
        ],
        'conflicts' => [],
        'suggests' => [],
    ],
    'autoload' => [
        'psr-4' => ['Brotkrueml\\FormCountrySelect\\' => 'Classes']
    ],
];
