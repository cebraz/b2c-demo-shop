<?php

namespace Pyz\Zed\Antelope\Communication\Controller;

use Generated\Shared\Transfer\AntelopeCriteriaTransfer;
use Generated\Shared\Transfer\AntelopeLocationTransfer;
use Generated\Shared\Transfer\AntelopeTransfer;
use Spryker\Zed\Kernel\Communication\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

/**
 * @method \Pyz\Zed\Antelope\Business\AntelopeFacadeInterface getFacade()
 */
class AntelopeController extends AbstractController
{
    /**
     * @return array<string, mixed>
     */
    public function addAction(Request $request): array
    {
        $antelopeTransfer = new AntelopeTransfer();

        $name = $request->get('name') ?: 'Carlos';

        $antelopeTransfer->setName($name);
        $antelopeTransfer->setLocationId(1);

        $antelopeTransfer = $this->getFacade()
            ->createAntelope($antelopeTransfer);

        $antelopeResponseTransfer = $this->getFacade()
            ->getAntelope((new AntelopeCriteriaTransfer())->setName($antelopeTransfer->getName()));

        if (!$antelopeResponseTransfer->getAntelope()) {
            $antelopeTransfer = $this->getFacade()
                ->createAntelope($antelopeTransfer);
        }

        return $this->viewResponse([
            'antelope' => $antelopeTransfer,
        ]);
    }
}
