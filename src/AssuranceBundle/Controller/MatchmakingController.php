<?php

namespace AssuranceBundle\Controller;

use DateTime;
use EntityBundle\Entity\agence_assurance;
use EntityBundle\Entity\contrat;
use EntityBundle\Entity\devis;
use EntityBundle\Entity\formule;
use EntityBundle\Entity\Garantie;
use EntityBundle\Entity\payment;
use EntityBundle\Entity\vehicule;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\GetSetMethodNormalizer;
use Symfony\Component\Validator\Constraints\NotBlank;

class MatchmakingController extends Controller
{
    public function showassuranceAction( Request $request)

    {
        $em = $this->getDoctrine()->getManager();
       $assurances =  $em->getRepository(agence_assurance::class)->findAll();
        if($request->isXmlHttpRequest()){
            $serializer = new Serializer(array(new ObjectNormalizer()));

            $ass=$em->getRepository(agence_assurance::class)
                ->findassurance($request->get('serie'));

            $data = $serializer->normalize($ass);
            return new JsonResponse($data);
        }




        return $this->render('@Assurance\Matchmaking\showassurance.html.twig', array(
            'assurances'=>$assurances
            // ...
        ));
    }

    public function showassurancedetailsAction($id,Request $request )
    {

        $em = $this->getDoctrine()->getManager();
        $assurances = $em->getRepository(agence_assurance::class)->find($id);
        $payments = $em->getRepository(payment::class)->findBy(array('customer'=>$id));
        $token = $this->container->get('security.token_storage')->getToken()->getUser();
        $count_payments= count($payments);
        $voiture = $em->getRepository(vehicule::class)->findvehicule($token->getID());
        $btn_contrat = $request->get('contrat');

            if($request->isMethod('post'))
            {
        // Set your secret key: remember to change this to your live secret key in production
// See your keys here: https://dashboard.stripe.com/account/apikeys
        \Stripe\Stripe::setApiKey("sk_test_KE1NkfMCuNVFiaU6e9qRYlVO");

// Token is created using Checkout or Elements!
// Get the payment token ID submitted by the form:
        $charge = \Stripe\Charge::create([
            'amount' => 1*100,
            'currency' => 'usd',
            'description' => 'Example charge',
            'source' => 'tok_visa',
        ]);

        $date =new DateTime();
        $payment =  new payment();
        $contrat = new contrat();

        $payment->setCustomer($token->getId());
        $payment->setAssurance($id);
        $payment->setDate($date);
        $payment->setAmount(1);






                    $dat = "date";
//1. Import the PayPal SDK client that was created in `Set up the Server SDK`.
                $vehicule = $em->getRepository(vehicule::class)->find($request->get('id_vehs'));

                $contrat->setVehicule($vehicule);
                $contrat->setAssurances($assurances);
                $contrat->setDateDebut($dat);
                $contrat->setTypeContrat('e');
                $contrat->setDateFin($dat);
                $contrat->setDateSignature($dat);
                $contrat->setReferenceContrat('ref1');
                $assurances->addContrat($contrat);
                $vehicule->setContrat($contrat);

                $em->persist($contrat);
                $em->persist($payment);
                $em->flush();


               return $this->redirectToRoute('success');

            }
        return $this->render('@Assurance\Matchmaking\details.html.twig', array(
            'details'=>$assurances,'vehicules'=>$voiture
        ));

    }

    public function DevisAction(Request $request)
    {
        $token = $this->container->get('security.token_storage')->getToken()->getUser();
        $id = $token->getId();
        $em = $this->getDoctrine()->getManager();
        if($request->isXmlHttpRequest()){


            $devis = new devis();
            $devis->setIdAssurance($request->get('serie'));
            $devis->setIdUser($id);

            $em->persist($devis);
            $em->flush();
            return new JsonResponse($devis);


        }


    }

    public  function setPriceAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        if($request->isXmlHttpRequest()){

            $serializer = new Serializer(array(new ObjectNormalizer()));
            $formules = $em->getRepository(formule::class)->getFormules($request->get('serie'));

            $garantie = $em->getRepository(Garantie::class)->findBygarantie($request->get('serie'));
            $result = array($formules,$garantie);
            $data = $serializer->normalize($result);
            return new JsonResponse($data);

        }
    }

    public function changePriceAction(Request $request)
    {

        $em = $this->getDoctrine()->getManager();
        if($request->isXmlHttpRequest()){

            $serializer = new Serializer(array(new ObjectNormalizer()));
            $garantie = $em->getRepository(Garantie::class)->findPriceByGarantie($request->get('nomGarantie'),$request->get('formule'));
            $data = $serializer->normalize($garantie);
            return new JsonResponse($data);

        }

    }

    public function successAction()
    {
        $token = $this->container->get('security.token_storage')->getToken()->getUser();
        $mailer= $this->get('mailer');


        $message = (new \Swift_Message('Aslemaaa'))
            ->setFrom('rami.dridi1@esprit.tn')
            ->setTo($token->getEmail())
            ->setBody(':D :D :D :D :D :D :D :D');

        $mailer->send($message);


        $basic  = new \Nexmo\Client\Credentials\Basic('74cf9174', '03qvU6mGnFXmIuQB');
        $client = new \Nexmo\Client($basic);

        $message = $client->message()->send([
            'to' => '21653411569',
            'from' => 'Ass Agency',
            'text' => 'Thank you for you order'
        ]);

        return $this->render('@Assurance\Matchmaking\success.html.twig', array(


        ));

    }
}
