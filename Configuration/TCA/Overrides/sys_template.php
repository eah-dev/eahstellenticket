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

defined('TYPO3_MODE') or die();

 /***************
 * variables
 */
$extension_key = 'eahstellenticket';

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile(
    $extension_key,
    'Configuration/TypoScript',
    'EAH-Jena-Plugin: eahstellenticket - jsontoelement (TypoScript)'
);
