<?php

/*
 * This file is part of the package ErnstAbbeHochschuleJena/Eahstellenticket.
 *
 * For the full copyright and license information, please read the
 * LICENSE file that was distributed with this source code.
 *
 * (c) 2021 Carsten Hölbing <carsten.hoelbing@eah-jena.de>, Ernst-Abbe-Hochschule Jena
 *
 */

$EM_CONF[$_EXTKEY] = [
    'title' => 'EAHJena Legislative Database',
    'description' => 'This package read a json file from stellenticket',
    'category' => 'plugin',
    'constraints' => [
        'depends' => [
            'typo3' => '9.5.0-10.4.99',
        ],
        'conflicts' => [
        ],
    ],
    'autoload' => [
        'psr-4' => [
            'ErnstAbbeHochschuleJena\\Eahstellenticket\\' => 'Classes'
        ],
    ],
    'state' => 'beta',
    'uploadfolder' => 0,
    'createDirs' => '',
    'clearCacheOnLoad' => 1,
    'author' => 'Carsten Hoelbing',
    'author_email' => 'carsten.hoelbing@eah-jena.de',
    'author_company' => 'Ernst-Abbe-Hochschule Jena',
    'version' => '1.0.0',
];
