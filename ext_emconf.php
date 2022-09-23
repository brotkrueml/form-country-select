<?php
$EM_CONF[$_EXTKEY] = [
    'title' => 'Form Country Select',
    'description' => 'Form element for selecting a country from a localised list',
    'category' => 'fe',
    'author' => 'Chris Müller',
    'author_email' => 'typo3@krue.ml',
    'state' => 'stable',
    'version' => '2.0.0-dev',
    'constraints' => [
        'depends' => [
            'typo3' => '10.4.11-11.5.99',
            'form' => '10.4.11-11.5.99',
        ],
        'conflicts' => [],
        'suggests' => [],
    ],
    'autoload' => [
        'psr-4' => ['Brotkrueml\\FormCountrySelect\\' => 'Classes']
    ],
];
