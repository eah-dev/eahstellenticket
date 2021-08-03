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

defined('TYPO3_MODE') || die('Access denied.');

$boot = function () {
    $VendorName = 'ErnstAbbeHochschuleJena';
    $extension_key = strtolower(\TYPO3\CMS\Core\Utility\GeneralUtility::underscoredToUpperCamelCase('eahstellenticket'));

    // Stellenticket
    \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
        $VendorName . '.' . $extension_key,
        'jsontoelement',
        [
            'Stellenticket' => 'list',
        ],
        // non-cacheable actions
        [
            'Stellenticket' => 'list'
        ]
    );

    /***************
     * Register Icons
     */
    $icons = [
        'plugin-jsontoelement' => 'eah-logo.svg',
    ];
    $iconRegistry = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Core\Imaging\IconRegistry::class);
    foreach ($icons as $identifier => $path) {
        $iconRegistry->registerIcon(
            $identifier,
            \TYPO3\CMS\Core\Imaging\IconProvider\SvgIconProvider::class,
            ['source' => 'EXT:eahstellenticket/Resources/Public/Icons/' . $path]
        );
    }
};

$boot();
unset($boot);
