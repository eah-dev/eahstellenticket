<?php
defined('TYPO3_MODE') || die('Access denied.');

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

use ErnstAbbeHochschuleJena\Eahstellenticket\Controller\StellenticketController;

$boot = function () {

    $extension_key = strtolower(\TYPO3\CMS\Core\Utility\GeneralUtility::underscoredToUpperCamelCase('eahstellenticket'));

    // Stellenticket
    \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
        $extension_key,
        'jsontoelement',
        [
            StellenticketController::class => 'list',
        ],
        // non-cacheable actions
        [
            StellenticketController::class => 'list'
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
