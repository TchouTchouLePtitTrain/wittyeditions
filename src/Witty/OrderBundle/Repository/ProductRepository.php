<?php

namespace Witty\OrderBundle\Repository;

use Doctrine\ORM\EntityRepository;

class ProductRepository extends EntityRepository
{
    public function findAllOrderedByPriority()
    {
        return $this->getEntityManager()
            ->createQuery('SELECT p FROM WittyOrderBundle:Product p ORDER BY p.priority DESC')
            ->getResult();
    }
}