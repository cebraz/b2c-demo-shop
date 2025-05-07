<?php

declare(strict_types=1);

namespace Pyz\Zed\Antelope\Business\Mapper;

use Generated\Shared\Transfer\AntelopeCollectionTransfer;
use Generated\Shared\Transfer\AntelopeLocationTransfer;
use Generated\Shared\Transfer\AntelopeTransfer;


class AntelopeMapper
{
    /**
     * Maps from a list of PyzAntelope/PyzAntelopeLocation
     * to a AntelopeCollectionTransfer.
     *
     * @param array $antelopeList List of antelope entity.
     * @param array $antelopeLocations List of antelope location entity.
     */
    public function mapEntityToAntelopeCollection(array $antelopeList,
                                                  array $antelopeLocations,
                                                  AntelopeCollectionTransfer $antelopeCollectionTransfer
    ): AntelopeCollectionTransfer
    {
        $antelopesMapped = array_map(function ($antelopeEntity) use ($antelopeLocations) {
            $antelopeTransfer = (new AntelopeTransfer())->fromArray($antelopeEntity->toArray(), true);
            $antelopeTransfer->setLocation($this->getAntelopeLocation($antelopeEntity->getLocationId(), $antelopeLocations));
            return $antelopeTransfer;
        }, $antelopeList);

        foreach ($antelopesMapped as $antelope) {
            $antelopeCollectionTransfer->addAntelope($antelope);
        }

        return $antelopeCollectionTransfer;
    }

    private function getAntelopeLocation(int $idLocation, array $locationEntities): AntelopeLocationTransfer
    {
        $antelopeLocationTransfer = null;
        foreach ($locationEntities as $locationEntity) {
            if ($locationEntity->getIdLocation() === $idLocation) {
                $antelopeLocationTransfer = (new AntelopeLocationTransfer())->fromArray($locationEntity->toArray(), true);
            }
        }
        return $antelopeLocationTransfer;
    }
}
