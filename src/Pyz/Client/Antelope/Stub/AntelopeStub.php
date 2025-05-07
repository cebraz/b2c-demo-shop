<?php

namespace Pyz\Client\Antelope\Stub;

use Generated\Shared\Transfer\AntelopeCollectionResponseTransfer;
use Generated\Shared\Transfer\AntelopeCriteriaTransfer;
use Generated\Shared\Transfer\AntelopeResponseTransfer;
use Spryker\Client\ZedRequest\ZedRequestClientInterface;

class AntelopeStub
{
    /**
     * @var \Spryker\Client\ZedRequest\ZedRequestClientInterface
     */
    protected $zedRequestClient;

    /**
     * @param \Spryker\Client\ZedRequest\ZedRequestClientInterface $zedRequestClient
     */
    public function __construct(ZedRequestClientInterface $zedRequestClient)
    {
        $this->zedRequestClient = $zedRequestClient;
    }

    public function getAntelope(AntelopeCriteriaTransfer $antelopeCriteria): AntelopeResponseTransfer
    {
        /** @var AntelopeResponseTransfer $antelopeResponseTransfer */
        $antelopeResponseTransfer = $this->zedRequestClient->call('/antelope/gateway/get-antelope', $antelopeCriteria);

        return $antelopeResponseTransfer;
    }

    public function getAntelopes(AntelopeCriteriaTransfer $antelopeCriteria): AntelopeCollectionResponseTransfer
    {
        /** @var AntelopeCollectionResponseTransfer $antelopeCollectionResponseTransfer */
        $antelopeCollectionResponseTransfer = $this->zedRequestClient
            ->call('/antelope/gateway/get-antelopes', $antelopeCriteria);

        return $antelopeCollectionResponseTransfer;
    }
}
