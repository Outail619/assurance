<?php

namespace AssuranceBundle\Controller;

use AssuranceBundle\Entity\User;
use EntityBundle\Entity\notification;
use EntityBundle\Entity\vehicule;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

class responsableController extends Controller
{
    public function usersAction(Request $request)
    {

        $entityManager = $this->getDoctrine()->getManager();
        $token = $this->container->get('security.token_storage')->getToken()->getUser();
        $id = $token->getId();

        $vehs = $entityManager->getRepository(vehicule::class)->getvehicules(3);
        $res = array();
        for( $k=0 ;$k<count($vehs);$k++)
        array_push($res,$vehs[$k]->getOwner());
        $ress=array_unique($res);

        /*$as=$entityManager->getRepository(notification::class)
            ->getnotif($id);
        if($request->isXmlHttpRequest()){
                $notif = new notification();
                $notif->setMessage("tst");
                $notif->setSender($id);
                $notif->setReceiver(9);
                $entityManager->persist($notif);
                $entityManager->flush();
            $serializer = new Serializer(array(new ObjectNormalizer()));
            $a=$entityManager->getRepository(notification::class)
                ->getnotif($id);

            // Add Circular reference handler

            $data = $serializer->normalize($a[1]);
            return new JsonResponse($data);
        }
        var_dump($as);*/
        return $this->render('@Assurance\responsable\users.html.twig', array(
                'users'=>$ress
        ));
    }

}
