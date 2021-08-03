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

namespace ErnstAbbeHochschuleJena\Eahstellenticket\Controller;

use ErnstAbbeHochschuleJena\Eahstellenticket\Domain\Repository\StellenticketRepository;

use TYPO3\CMS\Core\Database\QueryGenerator;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;
use TYPO3\CMS\Extbase\Mvc\View\ViewInterface;

/**
 * StellenticketController
 */
class StellenticketController extends ActionController
{
    /**
     * stellenticketRepository
     *
     * @var StellenticketRepository
     */
    protected $stellenticketRepository = null;
    /**
     * queryGenerator
     *
     * @var QueryGenerator
     *
     */
    protected $queryGenerator;

    /**
     * initializeAction
     */
    public function initializeAction()
    {
        $this->queryGenerator = GeneralUtility::makeInstance(QueryGenerator::class);
    }

    /**
     * Inject a course repository to enable DI
     *
     * @param \ErnstAbbeHochschuleJena\Eahstellenticket\Domain\Repository\StellenticketRepository $stellenticketRepository
     */
    public function injectStellenticketRepository(\ErnstAbbeHochschuleJena\Eahstellenticket\Domain\Repository\StellenticketRepository $stellenticketRepository)
    {
        $this->stellenticketRepository = $stellenticketRepository;
    }

    /**
     * Initializes the view before invoking an action method.
     *
     * @param ViewInterface $view The view to be initialized
     */
    protected function initializeView(ViewInterface $view)
    {
        $view->assign('contentObjectData', $this->configurationManager->getContentObject()->data);
        parent::initializeView($view);
    }

    /**
     * action list
     *
     * @return void
     */
    public function listAction(): void
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
        //$offersdata = $this->stellenticketRepository->getOffersFromPortalAsArray();
        $this->view->assign('offersdata', $offersdata);
    }
}
