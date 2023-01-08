<?php
defined('TYPO3_MODE') or die();

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

call_user_func(function () {

    /***
    * Extension key
    */
    $extension_key = strtolower(\TYPO3\CMS\Core\Utility\GeneralUtility::underscoredToUpperCamelCase('eahstellenticket'));

    /***
     * add Tca-Select-Item-Group
     */
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTcaSelectItemGroup(
        'tt_content',
        'list_type',
        'eahstellenticket',
        'LLL:EXT:' . $extension_key . '/Resources/Private/Language/locallang_be.xlf:mlang_tabs_tab',
        'after:lists'
    );

    \TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
        $extension_key,
        'jsontoelement',
        'LLL:EXT:eahstellenticket/Resources/Private/Language/locallang_be.xlf:jsontoelement.title',
        'EXT:' . $extension_key . '/Resources/Public/Icons/Extension.svg',
        'eahstellenticket',
    );

    /***
     * Flexform
     */
    $pluginName = strtolower('jsontoelement');
    $pluginSignature = $extension_key . '_' . $pluginName;
    $GLOBALS['TCA']['tt_content']['types']['list']['subtypes_excludelist'][$pluginSignature] = 'recursive,select_key,pages';
    $GLOBALS['TCA']['tt_content']['types']['list']['subtypes_addlist'][$pluginSignature] = 'pi_flexform';
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue(
        $pluginSignature,
        'FILE:EXT:eahstellenticket/Configuration/FlexForms/jsontoelement.xml'
    );

});

