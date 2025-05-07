<?php

namespace Pyz\Yves\AntelopePage\Plugin\Router;

use Spryker\Yves\Router\Plugin\RouteProvider\AbstractRouteProviderPlugin;
use Spryker\Yves\Router\Route\RouteCollection;

class AntelopePageRouteProviderPlugin extends AbstractRouteProviderPlugin
{
    public const ROUTE_NAME_ANTELOPE_NAME = 'antelope/antelope/_name_';
    public const ROUTE_INDEX_ANTELOPE = 'antelope/antelope/index';

    public function addRoutes(RouteCollection $routeCollection): RouteCollection
    {
        $routeCollection = $this->addAntelopeFindByNameRoute($routeCollection);
        $routeCollection = $this->addAntelopeCollectionRoutes($routeCollection);

        return $routeCollection;
    }

    private function addAntelopeFindByNameRoute(RouteCollection $routeCollection): RouteCollection
    {
        $route = $this->buildRoute('antelope/{name}', 'AntelopePage', 'Antelope', 'getAction');
        $route = $route->setMethods(['GET']);
        $routeCollection->add(static::ROUTE_NAME_ANTELOPE_NAME, $route);

        return $routeCollection;
    }

    public function addAntelopeCollectionRoutes(RouteCollection $routeCollection): RouteCollection
    {
        $route = $this->buildRoute('antelope/', 'AntelopePage', 'Antelope');
        $route = $route->setMethods(['GET']);
        $routeCollection->add(static::ROUTE_INDEX_ANTELOPE, $route);

        return $routeCollection;
    }
}
