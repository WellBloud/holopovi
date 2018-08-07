<?php

namespace App;

use App\Model\FrontModule\Repository\EventRepository;
use Nette;
use Nette\Application\Routers\Route;
use Nette\Application\Routers\RouteList;

class RouterFactory
{

    use Nette\StaticClass;

    /**
     * @var EventRepository
     */
    private $eventRepository;

    public function __construct(EventRepository $eventRepository)
    {
        $this->eventRepository = $eventRepository;
    }

    /**
     * @return Nette\Application\IRouter
     */
    public function createRouter()
    {
        $router = new RouteList;
        $router[] = new Route('galerie', [
            'presenter' => 'Gallery',
            'action' => 'default',
            'id' => null,
        ]);
        $router[] = new Route('galerie/<id>', [
            'presenter' => 'Gallery',
            'action' => 'detail',
            'id' => null,
        ]);
        $router[] = new Route('udalost/<id>', [
            'presenter' => 'EventDetail',
            'action' => 'default',
            'id' => [
                Route::FILTER_IN => function ($alias) {
                    $entity = $this->eventRepository->findOneByAlias($alias);
                    return $entity->getId();
                },
                Route::FILTER_OUT => function ($id) {
                    $entity = $this->eventRepository->find($id);
                    return $entity->getAlias();
                }
            ],
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
            'id' => null,
        ]);
        return $router;
    }

}
