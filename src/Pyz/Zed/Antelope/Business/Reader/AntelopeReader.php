<?php

namespace Pyz\Zed\Antelope\Business\Reader;

use Generated\Shared\Transfer\AntelopeCollectionResponseTransfer;
use Generated\Shared\Transfer\AntelopeCriteriaTransfer;
use Generated\Shared\Transfer\AntelopeResponseTransfer;
use Pyz\Zed\Antelope\Persistence\AntelopeRepositoryInterface;

class AntelopeReader
{
    protected AntelopeRepositoryInterface $antelopeRepository;

    public function __construct(AntelopeRepositoryInterface $antelopeRepository)
    {
        $this->antelopeRepository = $antelopeRepository;
    }

    public function getAntelope(AntelopeCriteriaTransfer $antelopeCriteria): AntelopeResponseTransfer
    {
        $antelopeTransfer = $this->antelopeRepository
            ->getAntelope($antelopeCriteria);

        $antelopeResponseTransfer = new AntelopeResponseTransfer();
        $antelopeResponseTransfer
            ->setIsSuccessful(false);

        if ($antelopeTransfer) {
            $antelopeResponseTransfer
                ->setAntelope($antelopeTransfer)
                ->setIsSuccessful(true);
        }

        return $antelopeResponseTransfer;
    }

    public function getAntelopes(AntelopeCriteriaTransfer $antelopeCriteria): AntelopeCollectionResponseTransfer
    {
        $antelopeCollectionTransfer = $this->antelopeRepository
            ->getAntelopes($antelopeCriteria);

        $antelopeCollectionResponseTransfer = new AntelopeCollectionResponseTransfer();

        foreach ($antelopeCollectionTransfer->getAntelopes() as $antelope) {
            $antelopeCollectionResponseTransfer->addAntelopes($antelope);
        }
        $antelopeCollectionResponseTransfer->setIsSuccessful(true);

        return $antelopeCollectionResponseTransfer;
    }

}
