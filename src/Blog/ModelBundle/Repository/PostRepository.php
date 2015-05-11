<?php

namespace Blog\ModelBundle\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * PostRepository
 */
class PostRepository extends EntityRepository
{
    /**
     * Find latest
     *
     * @param int $num Hw many posts to get
     *
     * @return array
     */
    public function findLatest($num)
    {
        $qb = $this->getQueryBilder()
            ->orderBy('p.createdAt', 'desc')
            ->setMaxResults($num);

        return $qb->getQuery()->getResult();
    }

    private function getQueryBilder()
    {
        $em = $this->getEntityManager();

        $qb = $em->getRepository('ModelBundle:Post')
            ->createQueryBuilder('p');

        return $qb;
    }
}
