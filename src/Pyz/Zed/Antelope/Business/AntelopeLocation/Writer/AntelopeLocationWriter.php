<?php

namespace Pyz\Zed\Antelope\Business\AntelopeLocation\Writer;

use Generated\Shared\Transfer\AntelopeLocationTransfer;
use Generated\Shared\Transfer\AntelopeTransfer;
use Pyz\Zed\Antelope\Persistence\AntelopeEntityManagerInterface;

class AntelopeLocationWriter
{
    protected AntelopeEntityManagerInterface $antelopeEntityManager;

    public function __construct(AntelopeEntityManagerInterface $antelopeEntityManager)
    {
        $this->antelopeEntityManager = $antelopeEntityManager;
    }

    public function create(AntelopeLocationTransfer $antelopeTransfer): AntelopeLocationTransfer
    {
        return $this->antelopeEntityManager->createAntelopeLocation($antelopeTransfer);
    }
}
