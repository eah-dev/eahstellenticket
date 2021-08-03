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
 * Plugin
 */

 $VendorName = 'ErnstAbbeHochschuleJena';
 $extension_key = strtolower(\TYPO3\CMS\Core\Utility\GeneralUtility::underscoredToUpperCamelCase('eahstellenticket'));

 \TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
     $VendorName . '.' . $extension_key,
     'jsontoelement',
     'LLL:EXT:eahstellenticket/Resources/Private/Language/locallang.xlf:jsontoelement.title'
 );

/*** Flexform *****/

$pluginName = strtolower('jsontoelement');
$pluginSignature = $extension_key . '_' . $pluginName;
$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_excludelist'][$pluginSignature] = 'recursive,select_key,pages';
$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_addlist'][$pluginSignature] = 'pi_flexform';
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue(
    $pluginSignature,
    'FILE:EXT:eahstellenticket/Configuration/FlexForms/jsontoelement.xml'
);

/*** Flexform *****/
