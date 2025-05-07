<?php

namespace Pyz\Zed\Antelope\Persistence;

use Generated\Shared\Transfer\AntelopeCollectionResponseTransfer;
use Generated\Shared\Transfer\AntelopeCollectionTransfer;
use Generated\Shared\Transfer\AntelopeCriteriaTransfer;
use Generated\Shared\Transfer\AntelopeLocationTransfer;
use Generated\Shared\Transfer\AntelopeTransfer;
use Orm\Zed\Antelope\Persistence\PyzAntelope;

interface AntelopeRepositoryInterface
{
    public function getAntelope(AntelopeCriteriaTransfer $antelopeCriteria): ?AntelopeTransfer;

    public function getAntelopeLocationById(int $id): ?AntelopeLocationTransfer;

    public function getAntelopes(AntelopeCriteriaTransfer $antelopeCriteria): AntelopeCollectionTransfer;

    public function getAntelopeLocations(array $antelopes);
}
