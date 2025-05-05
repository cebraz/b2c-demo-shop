<?php

namespace Pyz\Zed\Antelope\Communication\Controller;

use Spryker\Zed\Kernel\Communication\Controller\AbstractGatewayController;
use Generated\Shared\Transfer\AntelopeResponseTransfer;
use Generated\Shared\Transfer\AntelopeCriteriaTransfer;

/**
 * @method \Pyz\Zed\Antelope\Business\AntelopeFacadeInterface getFacade()
 */

class GatewayController extends AbstractGatewayController
{
    public function getAntelopeAction(AntelopeCriteriaTransfer $antelopeCriteria) : AntelopeResponseTransfer
    {
        return $this->getFacade()
            ->getAntelope($antelopeCriteria);
    }
}
