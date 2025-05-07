<?php

namespace Pyz\Zed\AntelopeLocationDataImport\Communication\Plugin\DataImport;

use Generated\Shared\Transfer\DataImporterConfigurationTransfer;
use Generated\Shared\Transfer\DataImporterReportTransfer;
use Pyz\Zed\AntelopeLocationDataImport\AntelopeLocationDataImportConfig;
use Spryker\Zed\DataImport\Dependency\Plugin\DataImportPluginInterface;
use Spryker\Zed\Kernel\Communication\AbstractPlugin;

class AntelopeLocationDataImportPlugin extends AbstractPlugin implements DataImportPluginInterface
{

    public function import(?DataImporterConfigurationTransfer $dataImporterConfigurationTransfer = null): DataImporterReportTransfer
    {
        return $this->getFacade()->import($dataImporterConfigurationTransfer);
    }

    public function getImportType(): string
    {
        return AntelopeLocationDataImportConfig::IMPORT_TYPE_ANTELOPE_LOCATION;
    }
}
