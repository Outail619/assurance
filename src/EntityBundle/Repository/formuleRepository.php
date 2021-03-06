<?php

namespace EntityBundle\Repository;

/**
 * formuleRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class formuleRepository extends \Doctrine\ORM\EntityRepository
{

    public function getFormules($ass){

        $qb=$this->getEntityManager()
            ->createQuery("SELECT u.id , u.total, a.id 
                            FROM EntityBundle:formule u
                            JOIN EntityBundle:agence_assurance a
                            WITH u.agence = a.id
                            WHERE u.nomFormule =:wod ")
            ->setParameter('wod',$ass);
        return $qb->getResult();

    }
}
