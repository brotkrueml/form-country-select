<?php
$EM_CONF[$_EXTKEY] = [
    'title' => 'Form Country Select',
    'description' => 'Form element for selecting a country from a localised list',
    'category' => 'fe',
    'author' => 'Chris Müller',
    'author_email' => 'typo3@krue.ml',
    'state' => 'stable',
    'version' => '1.4.0-dev',
    'constraints' => [
        'depends' => [
            'typo3' => '9.5.16-11.5.99',
            'form' => '9.5.16-11.5.99',
        ],
        'conflicts' => [],
        'suggests' => [],
    ],
    'autoload' => [
        'psr-4' => ['Brotkrueml\\FormCountrySelect\\' => 'Classes']
    ],
];
