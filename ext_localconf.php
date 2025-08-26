<?php
defined('TYPO3') || die();

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

$extensionKey = 'eahstellenticket';

// Stellenticket
\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
    $extensionKey,
    'jsontoelement',
    [
        StellenticketController::class => 'list',
    ],
    // non-cacheable actions
    [
        StellenticketController::class => 'list'
    ],
    \TYPO3\CMS\Extbase\Utility\ExtensionUtility::PLUGIN_TYPE_CONTENT_ELEMENT
);
