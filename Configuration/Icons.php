<?php

/***
 * This file is part of the "jsontoelement" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * (c) 2024 Carsten Hoelbing <carsten.hoelbing@eah-jena.de>, Ernst-Abbe-Hochschule Jena
 *
 */
$extensionKey = "jsontoelement";

return [
    'ext-jsontoelement-plugin' => [
        'provider' => \TYPO3\CMS\Core\Imaging\IconProvider\SvgIconProvider::class,
        'source' => 'EXT:' . $extensionKey . '/Resources/Public/Icons/Extension.svg'
    ]
];
