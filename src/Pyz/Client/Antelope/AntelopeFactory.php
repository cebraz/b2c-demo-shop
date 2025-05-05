<?php

namespace Pyz\Client\Antelope;

use Pyz\Client\Antelope\Stub\AntelopeStub;
use Spryker\Client\ZedRequest\ZedRequestClientInterface;
use Spryker\Client\Kernel\AbstractFactory;

class AntelopeFactory extends AbstractFactory
{
    public function createAntelopeStub(): AntelopeStub
    {
        return new AntelopeStub(
            $this->getZedRequestClient()
        );
    }

    public function getZedRequestClient(): ZedRequestClientInterface
    {
        return $this->getProvidedDependency(AntelopeDependencyProvider::CLIENT_ZED_REQUEST);
    }
}
