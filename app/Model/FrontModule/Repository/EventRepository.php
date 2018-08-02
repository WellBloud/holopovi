<?php
/**
 * @author: wellbloud
 * created: 2.8.18
 */


namespace App\Model\FrontModule\Repository;

use App\Model\Entities\Event;
use Doctrine\ORM\EntityRepository;

class EventRepository extends EntityRepository
{
    public function findAllOrderedByDateDesc()
    {
        return $this->createQueryBuilder()
            ->addSelect('e')
            ->from(Event::class, 'e')
            ->orderBy('e.happenedOn', 'DESC');

    }
}