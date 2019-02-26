<?php

namespace EntityBundle\Repository;

/**
 * GarantieRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class GarantieRepository extends \Doctrine\ORM\EntityRepository
{


    public function findBygarantie($formule){
        $query = $this->getEntityManager()
            ->createQuery("select DISTINCT m.nomGarantie , m.id from EntityBundle:Garantie m JOIN EntityBundle:formule f  WITH m.formule=f.id WHERE f.nomFormule=:nom")
            ->setParameter('nom',$formule);
        return $query->getResult();

    }



    public function findPriceByGarantie($garantie,$formule){
        $query = $this->getEntityManager()
            ->createQuery("select m.valeur from EntityBundle:Garantie m JOIN EntityBundle:formule f WITH m.formule=f.id  WHERE m.nomGarantie=:nid AND f.nomFormule=:formule ")
            ->setParameter('nid',$garantie)
            ->setParameter('formule',$formule);

        return $query->getResult();
    }
}