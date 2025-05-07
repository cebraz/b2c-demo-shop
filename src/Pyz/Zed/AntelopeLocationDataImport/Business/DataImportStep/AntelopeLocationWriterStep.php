<?php

namespace Pyz\Zed\AntelopeLocationDataImport\Business\DataImportStep;

use Orm\Zed\Antelope\Persistence\PyzAntelopeLocationQuery;
use Propel\Runtime\Exception\PropelException;
use Pyz\Zed\AntelopeLocationDataImport\Business\DataSet\AntelopeLocationDataSetInterface;
use Spryker\Zed\DataImport\Business\Model\DataImportStep\DataImportStepInterface;
use Spryker\Zed\DataImport\Business\Model\DataSet\DataSetInterface;
use Spryker\Zed\Propel\Business\Exception\AmbiguousComparisonException;

class AntelopeLocationWriterStep implements DataImportStepInterface
{

    /**
     * @throws PropelException
     * @throws AmbiguousComparisonException
     */
    public function execute(DataSetInterface $dataSet): void
    {
        $locationEntity = PyzAntelopeLocationQuery::create()
            ->filterByLocationName($dataSet[AntelopeLocationDataSetInterface::COLUMN_LOCATION_NAME])
            ->findOneOrCreate();

        $locationEntity->setLatitude($dataSet[AntelopeLocationDataSetInterface::COLUMN_LATITUDE]);
        $locationEntity->setLongitude($dataSet[AntelopeLocationDataSetInterface::COLUMN_LONGITUDE]);

        if($locationEntity->isNew() || $locationEntity->isModified()) {
            $locationEntity->save();
        }
    }
}
