<?php

namespace FrontEndBundle\Repository;

/**
 * GustoRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class GustoRepository extends \Doctrine\ORM\EntityRepository
{
  public function findAllOrderedByName()
  {
    return $this->getEntityManager()->createQuery('SELECT g FROM FrontEndBundle:Gusto g ORDER BY g.nomeGusto ASC')->getResult();
    }
}
