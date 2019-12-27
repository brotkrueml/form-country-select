<?php
$EM_CONF[$_EXTKEY] = [
    'title' => 'Form Country Select',
    'description' => 'Form element for selecting a country from a localised list',
    'category' => 'fe',
    'author' => 'Chris Müller',
    'author_email' => 'typo3@krue.ml',
    'state' => 'stable',
    'version' => '1.0.0',
    'constraints' => [
        'depends' => [
            'typo3' => '9.5.0-10.4.99',
        ],
        'conflicts' => [],
        'suggests' => [],
    ],
    'autoload' => [
        'psr-4' => ['Brotkrueml\\FormCountrySelect\\' => 'Classes']
    ],
];
