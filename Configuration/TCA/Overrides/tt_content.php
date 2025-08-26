<?php
defined('TYPO3') || die();

/***
 *
 * This file is part of the "eahstellenticket" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE file that was distributed with this source code.
 *
 * (c) 2021 Carsten Hoelbing <carsten.hoelbing@eah-jena.de>
 *
 */
use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;
use TYPO3\CMS\Extbase\Utility\ExtensionUtility;

call_user_func(function (): void {

    /***
    * Extension key
    */
    $extensionKey = 'eahstellenticket';

    /***
     * add Tca-Select-Item-Group
     */
    ExtensionManagementUtility::addTcaSelectItemGroup(
        'tt_content',
        'list_type',
        'eahstellenticket',
        'LLL:EXT:' . $extensionKey . '/Resources/Private/Language/locallang_be.xlf:mlang_tabs_tab',
        'after:lists'
    );

    /***
     * jsontoelement
     */
    $pluginName = strtolower('jsontoelement');
    $pluginSignature = ExtensionUtility::registerPlugin(
        $extensionKey,
        $pluginName,
        'LLL:EXT:' . $extensionKey . '/Resources/Private/Language/locallang_be.xlf:' . $pluginName . '.name',
        'ext-jsontoelement-plugin',
        'eahstellenticket'
    );
    ExtensionManagementUtility::addToAllTCAtypes(
        'tt_content', '--div--;Configuration,pi_flexform,', $pluginSignature, 'after:subheader'
    );
    ExtensionManagementUtility::addPiFlexFormValue(
        '*',
        'FILE:EXT:' . $extensionKey . '/Configuration/FlexForms/' . $pluginName . '.xml',
        $pluginSignature,
    );

});
