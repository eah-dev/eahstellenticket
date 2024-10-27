<?php
defined('TYPO3') or die();

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

$extension_key = 'eahstellenticket';

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
