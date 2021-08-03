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

namespace ErnstAbbeHochschuleJena\Eahstellenticket\Domain\Repository;

use TYPO3\CMS\Core\Error\Exception;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Persistence\Repository;

/**
 * The repository for Statistics
 */
class StellenticketRepository extends Repository
{
    /**
     * @return array
     */
    public function getOffersFromPortalAsArray($url = null): array
    {
        $data = [];
        $json = '';

        // create opts header
        $opts = [
            'http'=>[
            'method'=>'GET',
            'header'=>"Accept-language: en\r\n" .
                        "Cookie: foo=bar\r\n"
            ]
        ];

        $context = stream_context_create($opts);

        $stellenticketurl = [
            [
                'title' => 'eahj_prof',
                'url' => 'https://stellenticket.eah-jena.de/de/html/eahj_offers?namespace=eahj_prof'
            ],
            [
                'title' => 'eahj_wiss',
                'url' => 'https://stellenticket.eah-jena.de/de/html/eahj_offers?namespace=eahj_wiss'
            ],
            [
                'title' => 'eahj_verwalt',
                'url' => 'https://stellenticket.eah-jena.de/de/html/eahj_offers?namespace=eahj_verwalt'
            ],
            [
                'title' => 'eahj_ausb',
                'url' => 'https://stellenticket.eah-jena.de/de/html/eahj_offers?namespace=eahj_ausb'
            ]
        ];

        foreach ($stellenticketurl as $item) {
            // open file withe the opts HTTP-Headern
            try {
                $json = file_get_contents($item['url']);//, false, $context);
            } catch (Exception $e) {
                $this->logger = GeneralUtility::makeInstance(\TYPO3\CMS\Core\Log\LogManager::class)->getLogger(__CLASS__);
                $this->logger->waring($e->getMessage());
            }

            if ($json != '') {
                $data[$item['title']] = json_decode($json, true);
            }
        }

        return $data;
    }

    /**
     * @return array
     */
    public function getDatafromPortalURLAsArray($url = null): array
    {
        $data = [];
        $json = '';

        // create opts header
        $opts = [
            'http'=>[
            'method'=>'GET',
            'header'=>"Accept-language: en\r\n" .
                        "Cookie: foo=bar\r\n"
            ]
        ];

        $context = stream_context_create($opts);

        // open file withe the opts HTTP-Headern
        try {
            $json = file_get_contents($url);//, false, $context);
        } catch (Exception $e) {
            $this->logger = GeneralUtility::makeInstance(\TYPO3\CMS\Core\Log\LogManager::class)->getLogger(__CLASS__);
            $this->logger->waring($e->getMessage());
        }

        if ($json != '') {
            $data = json_decode($json, true);
        }

        return $data;
    }
}
