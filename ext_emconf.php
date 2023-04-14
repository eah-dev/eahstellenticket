<?php

/***
 *
 * This file is part of the "eahstellenticket" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE file that was distributed with this source code.
 *
 * (c) 2021 Carsten Hoelbing <carsten.hoelbing@eah-jena.de>, Ernst-Abbe-Hochschule Jena
 *
 */

$EM_CONF[$_EXTKEY] = [
    'title' => 'EAH Jena - Stellenticket',
    'description' => 'This package read a json file from stellenticket',
    'category' => 'plugin',
    'constraints' => [
        'depends' => [
            'typo3' => '10.4.0-11.5.99',
        ]
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
    'version' => '1.0.1',
];
