<?php

namespace EntityBundle\Repository;

use Doctrine\ORM\NonUniqueResultException;


/**
 * agence_assuranceRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */

class agence_assuranceRepository extends \Doctrine\ORM\EntityRepository
{

    public function findassurance($ass){

        $qb=$this->getEntityManager()
            ->createQuery("SELECT u.nomAgence, u.adresseAgence , u.telAgence , u.typeAgence
                            FROM EntityBundle:agence_assurance u
                            WHERE u.nomAgence =:wod ")
            ->setParameter('wod',$ass);

            return $qb->getResult();

    }

}
