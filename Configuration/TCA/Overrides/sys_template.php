<?php
defined('TYPO3_MODE') or die();

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

call_user_func(function () {

    /***
    * Extension key
    */
    $extension_key = strtolower(\TYPO3\CMS\Core\Utility\GeneralUtility::underscoredToUpperCamelCase('eahstellenticket'));

    /***
     * Add default TypoScript (constants and setup)
     */
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile(
        $extension_key,
        'Configuration/TypoScript',
        'EAH-Jena Plugin: eahstellenticket (TypoScript)'
    );

});
