<?php

namespace EntityBundle\Repository;

/**
 * vehiculeRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class vehiculeRepository extends \Doctrine\ORM\EntityRepository
{


    public function findvehicule($owner){
        $query = $this->getEntityManager()
            ->createQuery("select  m.marque , m.id from EntityBundle:vehicule m WHERE m.owner=:nom AND m.contrat IS NULL")
            ->setParameter('nom',$owner);

        return $query->getResult();

    }
    public function getvehicules($assurance){
        $query = $this->getEntityManager()
            ->createQuery("SELECT m FROM EntityBundle:vehicule m JOIN EntityBundle:contrat c WITH m.id=c.vehicule  WHERE c.assurances=:id")
            ->setParameter('id',$assurance);

        return $query->getResult();

    }

}
