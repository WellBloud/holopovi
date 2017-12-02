<?php

namespace App;

use Nette;
use Nette\Application\Routers\RouteList;
use Nette\Application\Routers\Route;

class RouterFactory
{

    use Nette\StaticClass;

    /**
     * @return Nette\Application\IRouter
     */
    public static function createRouter()
    {
        $router = new RouteList;
        $router[] = new Route('galerie', [
            'presenter' => 'Gallery',
            'action' => 'default',
            'id' => NULL,
        ]);
        $router[] = new Route('galerie/<id>', [
            'presenter' => 'Gallery',
            'action' => 'detail',
            'id' => NULL,
        ]);
        $router[] = new Route('<presenter>/<action>/<id>', [
            'presenter' => [
                Route::VALUE => 'Homepage',
                Route::FILTER_TABLE => [
                    // řetězec v URL => presenter
                    'oznameni' => 'Invitation',
                    'galerie' => 'Gallery',
                    'udalosti' => 'Events',
                ],
            ],
            'action' => 'default',
            'id' => NULL,
        ]);
        return $router;
    }

}
