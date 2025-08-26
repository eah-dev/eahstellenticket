<?php
declare(strict_types=1);

/***
 * This file is part of the "Eahstellenticket" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE file that was distributed with this source code.
 *
 * (c) 2021 Carsten Hoelbing <carsten.hoelbing@eah-jena.de>, Ernst-Abbe-Hochschule Jena
 *
 */

namespace ErnstAbbeHochschuleJena\Eahstellenticket\Controller;

use ErnstAbbeHochschuleJena\Eahstellenticket\Domain\Repository\StellenticketRepository;

use Psr\Http\Message\ResponseInterface;
//use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;
//use TYPO3\CMS\Extbase\Mvc\View\ViewInterface;

/**
 * StellenticketController
 */
class StellenticketController extends ActionController
{
    public function __construct(
        /**
         * stellenticketRepository
         */
        protected \ErnstAbbeHochschuleJena\Eahstellenticket\Domain\Repository\StellenticketRepository $stellenticketRepository
    )
    {
    }
    /**
     * action list
     */
    public function listAction(): ResponseInterface
    {
        if ($this->settings['showeahjprof'])
        {
            $offersdata['eahj_prof'] = $this->stellenticketRepository->getDatafromPortalURLAsArray('https://stellenticket.eah-jena.de/de/html/eahj_offers?namespace=eahj_prof');
        }

        if ($this->settings['showeahjwiss'])
        {
            $offersdata['eahj_wiss'] = $this->stellenticketRepository->getDatafromPortalURLAsArray('https://stellenticket.eah-jena.de/de/html/eahj_offers?namespace=eahj_wiss');
        }

        if ($this->settings['showeahjverw'])
        {
            $offersdata['eahj_verwalt'] = $this->stellenticketRepository->getDatafromPortalURLAsArray('https://stellenticket.eah-jena.de/de/html/eahj_offers?namespace=eahj_verwalt');
        }

        if ($this->settings['showeahjausb'])
        {
            $offersdata['eahj_ausb'] = $this->stellenticketRepository->getDatafromPortalURLAsArray('https://stellenticket.eah-jena.de/de/html/eahj_offers?namespace=eahj_ausb');
        }

        $this->view->assign('offersdata', $offersdata);

        return $this->htmlResponse();

    }
}
