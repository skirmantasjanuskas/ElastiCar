<?php

namespace AppBundle\Repository;

/**
 * AutoRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class AutoRepository extends \Doctrine\ORM\EntityRepository
{
    /**
     * @param $id
     * @param array $columns
     * @param int $limit
     * @param int $offset
     * @return mixed
     */
    public function findByWatchlistId($id, array $columns, $limit = 1000, $offset = 0)
    {
        array_walk($columns, function (&$key) {
            $key = "auto." . $key;
        });

        return $this->createQueryBuilder('auto')
            ->select($columns)
            ->where('auto.watchlistId = :watchlistId')
            ->setParameter('watchlistId', $id)
            ->setFirstResult($offset)
            ->setMaxResults($limit)
            ->getQuery()
            ->execute();
    }
}
