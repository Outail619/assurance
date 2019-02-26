<?php

namespace AssuranceBundle\Controller;
use DateTime;
use EntityBundle\Entity\agence_assurance;
use EntityBundle\Entity\contrat;
use EntityBundle\Entity\voitures;
use Nexmo\Client\Exception\Exception;
use Nexmo\Client\Exception\Server;
use Swift_Mailer;
use Swift_SmtpTransport;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;
use Yamilovs\Bundle\SmsBundle\Service\ProviderManager;
use Yamilovs\Bundle\SmsBundle\Sms\Sms;
use AssuranceBundle\Entity\User;
use EntityBundle\Entity\vehicule;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Validator\Constraints\Date;

class HomeController extends Controller
{
    public function homeAction()
    {

        $this->denyAccessUnlessGranted('ROLE_USER');

        $auth_checker = $this->get('security.authorization_checker');
        if ($auth_checker->isGranted('ROLE_ADMIN')) {

            return $this->redirectToRoute("admin");

        }
        else
        {
            return $this->render('@Assurance\Home\home.html.twig', array(
                // ...
            ));
        }
    }

    public function addinfoAction(Request $request)
    {

        $user = new User();
        $vehicule = new vehicule();
        if ($request->isMethod('Post')) {

            //user
            $user->setCin('null');
            $user->setNom($request->get('full_name'));
            $user->setPrenom($request->get('full_name'));
            $user->setAddresse($request->get('address'));
            $user->setProfession('null');
            $user->setDateNaissance('date');
            $user->setEmail($request->get('email'));
            $user->setTelephone($request->get('phone'));
            $user->setCodePostale(3201);
            //$user->setImageCin($request->get('fileselect'));
            $user->setUsername($request->get('full_name'));
            if(isset($_FILES["fileselect"]['name']))
                if($_FILES["fileselect"]['name'] != ""){
                    move_uploaded_file($_FILES['fileselect']['tmp_name'],__DIR__.'/../../../web/images/'.$_FILES["fileselect"]['name']);
                    $user->setImageCin($_FILES["fileselect"]['name']);
                }
            $plainPassword = $request->get('password');
            $encoder = $this->get('security.encoder_factory')->getEncoder($user);
            $encoded= $encoder->encodePassword($plainPassword,'sha512s');

            $user->setPassword($encoded);
            $user->setEnabled(true);
            $em = $this->getDoctrine()->getManager();

            ////////////voiture

            $date_circulation = new DateTime($request->get('date_circulation'));
            $vehicule->setMarque($request->get('marque'));
            $vehicule->setMatricule($request->get('matricule'));
            $vehicule->setCarburant($request->get('carburant'));
            $vehicule->setDateCirculation($date_circulation);
            $vehicule->setNbPlace($request->get('nbplace'));
            $vehicule->setTypeUsage('null');
            $vehicule->setValeurDeclare($request->get('valuer_d'));
            $vehicule->setValeurNeuve($request->get('valuer_n'));
            $vehicule->setValeurMarche($request->get('valuer_n'));
            $vehicule->setPuissanceFiscale($request->get('puissance'));
            $user->addVehicule($vehicule);
            $em->persist($user);
            $em->persist($vehicule);

            $em->flush();
            return $this->redirect('/assure/web/app_dev.php/login');
        }
        return $this->render('@Assurance/Home/register.html.twig', array(// ...
        ));
    }

    public function accountAction(Request $request)
    {
        $token = $this->container->get('security.token_storage')->getToken()->getUser();
        $id = $token->getId();
        $entityManager = $this->getDoctrine()->getManager();
        $btn_add= $request->get('add');
        $btn_edit = $request->get('editv');
        $btn_submit = $request->get('btn_submit');
        if($request->isXmlHttpRequest()){
            $serializer = new Serializer(array(new ObjectNormalizer()));

            $a=$entityManager->getRepository(contrat::class)
                ->getcontratassurance($request->get('serie'));


// Add Circular reference handler

            $data = $serializer->normalize($a);
            return new JsonResponse($data);
        }
        if(isset($btn_add))
        {
            $vehicule = new vehicule();
            $date_circulation = new DateTime($request->get('date_circulation'));
            $vehicule->setMarque($request->get('marque'));
            $vehicule->setMatricule($request->get('matricule'));
            $vehicule->setCarburant($request->get('carburant'));
            $vehicule->setDateCirculation($date_circulation);
            $vehicule->setNbPlace($request->get('nbplace'));
            $vehicule->setTypeUsage('null');
            $vehicule->setValeurDeclare($request->get('valeur_dec'));
            $vehicule->setValeurNeuve($request->get('valeur_neuv'));
            $vehicule->setValeurMarche($request->get('valeur_neuv'));
            $vehicule->setPuissanceFiscale($request->get('puissance'));
            $token->addVehicule($vehicule);


            $entityManager->persist($vehicule);
            $entityManager->flush();
            return $this->redirectToRoute('account');

        }

        if (isset($btn_edit)) {

            $id = $request->get('idvehicule');

            $vehicule = $entityManager->getRepository(vehicule::class)->find($id);
            $vehicule->setValeurNeuve($request->get('valeur'));
            $vehicule->setMatricule($request->get('matricule'));
            $vehicule->setCarburant($request->get('carburant'));
            $vehicule->setPuissanceFiscale($request->get('puissance'));
            $entityManager->flush();

        }
        if (isset($btn_submit)) {





            /*$token->setEmail($request->get('email1'));
            $token->setUsername($request->get('usr'));
            $token->setTelephone($request->get('phone1'));
            $token->setAddresse($request->get('address1'));
            $token->setCin($request->get('cin1'));
            $entityManager->flush();*/
        }


        $vehicules = $token->getVehicules();


        return $this->render('@Assurance/Account/account.html.twig', array(// ...
        'vehicule'=>$vehicules));
    }

    public function deleteAction($id){
        $token = $this->container->get('security.token_storage')->getToken()->getUser();

        //the manager is the responsible for saving objects, deleting and updating object

        $em=$this->getDoctrine()->getManager();

        $vehicule=$em->getRepository(vehicule::class)->find($id);

        //the remove() method notifies Doctrine that you'd like to remove the given object from the database
        $token->removeVehicule($vehicule);
        $em->remove($vehicule);

        //The flush() method execute the DELETE query.

        $em->flush();

        //redirect our function to the read page to show our table
        return $this->redirectToRoute('account');

    }

}
