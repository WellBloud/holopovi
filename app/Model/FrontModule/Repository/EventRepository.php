<?php

/**
 * @author: wellbloud
 * created: 2.8.18
 */

namespace App\Model\FrontModule\Repository;

use App\Model\Entities\Event;
use DateTime;
use Doctrine\ORM\EntityRepository;

class EventRepository extends EntityRepository
{
    /**
     * @param int      $count
     * @param int|null $offset
     * @return mixed
     */
    public function findAllOrderedByDateDesc(
        int $count,
        int $offset = null
    ) {
        return $this->createQueryBuilder('e')
            ->orderBy('e.happenedOn', 'DESC')
            ->setMaxResults($count)
            ->setFirstResult($offset ?? null)
            ->getQuery()
            ->getResult();

    }

    /**
     * @param string $album
     * @return Event|null
     * @throws \Doctrine\ORM\NoResultException
     * @throws \Doctrine\ORM\NonUniqueResultException
     */
    public function findOneByAlbum(string $album): ?Event
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.album = :album')
            ->setParameter('album', $album)
            ->getQuery()
            ->getSingleResult();
    }

    /**
     * @param string $alias
     * @return Event
     * @throws \Doctrine\ORM\NoResultException
     * @throws \Doctrine\ORM\NonUniqueResultException
     */
    public function findOneByAlias(string $alias): Event
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.alias = :alias')
            ->setParameter('alias', $alias)
            ->getQuery()
            ->getSingleResult();
    }

    public function findOlder(DateTime $date): ?Event
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.happenedOn < :date')
            ->addOrderBy('e.happenedOn', 'desc')
            ->setMaxResults(1)
            ->setParameter('date', $date)
            ->getQuery()
            ->getOneOrNullResult();
    }

    public function findNewer(DateTime $date): ?Event
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.happenedOn > :date')
            ->addOrderBy('e.happenedOn', 'asc')
            ->setMaxResults(1)
            ->setParameter('date', $date)
            ->getQuery()
            ->getOneOrNullResult();
    }
}