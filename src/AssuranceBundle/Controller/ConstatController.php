<?php

namespace AssuranceBundle\Controller;

use Endroid\QrCode\Factory\QrCodeFactory;
use EntityBundle\Entity\constat;
use EntityBundle\Entity\contrat;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use EntityBundle\Entity\notification;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\HttpFoundation\Request;
use BaconQrCode\Renderer\ImageRenderer;
use BaconQrCode\Renderer\Image\ImagickImageBackEnd;
use BaconQrCode\Renderer\RendererStyle\RendererStyle;
use BaconQrCode\Writer;
use Endroid\QrCode\QrCode;
use Symfony\Bundle\SwiftmailerBundle\SwiftmailerBundle;
use Symfony\Component\HttpFoundation\Response;

class ConstatController extends Controller
{
    public function ListAction(Request $request)
    {
        $user = $this->container->get('security.token_storage')->getToken()->getUser();
        $id = $user->getId();
        $contrat = new contrat();
        $contrat = $this->getDoctrine()->getManager()->getRepository(contrat::class)->findByIDclient($id);
        $constats=$this->getDoctrine()                 // nous déclarons la variable qui va contenir toutes les voitures
        ->getRepository(constat::class)                // appel du répository en lui précisant l'entité que nous allons travailler sur
        ->findByIDclientEtat($id);
        if($request->isMethod('POST'))
        {
            $idd=$request->get('id');
            var_dump($idd);
            $em = $this->getDoctrine()->getManager();
            $constat = new constat();
            $constat->setDateConstat(\DateTime::createFromFormat('d-m-Y', $request->get('C2'.$idd)));
            $constat = $em->getRepository(constat::class)->find($idd);
            $constat->setObservations($request->get('C6'.$idd));
            $constat->setLieu($request->get('C3'.$idd));
            $em->flush();
            return $this->render('@Assurance\Constat&Accident\AffichageConstat.html.twig', array('constats' => $constats,'contrats' =>$contrat
                // ...
            ));
        }
        return $this->render('@Assurance\Constat&Accident\AffichageConstat.html.twig', array('constats' => $constats,'contrats' =>$contrat
            // ...
        ));
    }
    public function createAction(Request $request)
    {
       /* $qrCodeFactory = new QrCode('https://localhost/assure/web/app_dev.php/assurance/ListConstat');
        $qrCodeFactory->writeDataUri();
        header('Content-Type: '.$qrCodeFactory->getContentType());
        echo $qrCodeFactory->writeString();
        echo $qrCodeFactory->writeFile('/../../../'.'/images.png');*/
        $user = $this->container->get('security.token_storage')->getToken()->getUser();
        $id = $user->getId();
        $contrats = new contrat();
        $cont = new contrat();
        $em = $this->getDoctrine()->getManager();
        $constat=new constat();
        $contrats = $em->getRepository(contrat::class)->findByIDclient($id);
        $cont= $em->getRepository(contrat::class)->findAllExcept($id);

       if($request->isMethod('POST'))
       {
           $constat->setId_constat($id.($id+1).($id-1).random_int(1, 9).random_int(1, 9).random_int(1, 9).random_int(1, 9).random_int(1, 9));

           $constat->setQrcode('QR'.$constat->getId_constat().'.png');
           /*$qrCodeFactory = new QrCode('test');
           $qrCodeFactory->writeFile(__DIR__.'/../../../web/images/constat/QR'.$constat->getId_constat().'.png');*/
           $constat->setID_client($id);
            $constat->setDegatsHumains($request->get('degath'));
            $constat->setDegatsMat($request->get('degatm'));
           $constat->setIDContratA($request->get('contrata'));
           $constat->setIDContratB($request->get('contratb'));
           $constat->setLieu($request->get('Place'));
           $constat->setImage('');
           $constat->file=$request->files->get('fileselect');
           if(isset($_FILES["fileselect"]['name']))
               if($_FILES["fileselect"]['name'] != ""){
                   move_uploaded_file($_FILES['fileselect']['tmp_name'],__DIR__.'/../../../web/images/constat/PIC'.$constat->getId_constat().'png');
                   $constat->setImage('PIC'.$constat->getId_constat().'png');
               }
           /*var_dump($request->files->all());
           $filename = md5(uniqid()).'.'.$constat->file->guessExtension();
           $constat->file->move($this->getParameter('/images/'), $filename);*/
           $constat->setObservations($request->get('obs'));
           $constat->setCirconstances($request->get('c1').$request->get('c2').$request->get('c3').$request->get('c4').$request->get('c5')
               .$request->get('c6').$request->get('c7').$request->get('c8').$request->get('c9').$request->get('c10')
               .$request->get('c11').$request->get('c12').$request->get('c13').$request->get('c14').$request->get('c15'));
            $date=new \DateTime();
            $constat->setDateConstat($date);
            $constat->setEtat(0);
           // $constat->setQrcode("http://api.qrserver.com/v1/create-qr-code/?data="."https://localhost/assure/web/app_dev.php/assurance/ListConstat"."&size=100x100");
           $constats=$this->getDoctrine()                 // nous déclarons la variable qui va contenir toutes les voitures
           ->getRepository(constat::class)                // appel du répository en lui précisant l'entité que nous allons travailler sur
           ->findByIDclient($id);
           $contrat = $this->getDoctrine()->getManager()->getRepository(contrat::class)->findByIDclient($id);
          /* $message = (new \Swift_Message('Hello Email'))
               ->setFrom('outail619@esprit.tn')
               ->setTo('outail.ouni@esprit.tn')
               ->setBody(
                   /*$this->renderView(
                   // app/Resources/views/Emails/registration.html.twig
                       '@Assurance\Constat&Accident\AffichageConstat.html.twig', array('constats' => $constats,'contrats' =>$contrat
            // ...
        )
                   ),
                   'text/html'
               );
           $transport = (new \Swift_SmtpTransport('smtp.live.com', 587,'ssl'))
               ->setUsername('hihi-lala@live.com')
               ->setPassword('01012011');
           $mailer = new \Swift_Mailer($transport);
           $mailer->send($message);*/
           $this->notifier($constat);






           $em->persist($constat);
           $em->flush();
           $mailer= $this->get('mailer');
           $message = (new \Swift_Message('Confirmation de l"ajout du constat'))
               ->setFrom('rami.dridi1@esprit.tn')
               ->setTo($user->getEmail())
               ->setBody('Salutations Monsieur/Madame '.$user->getNom().' '.
                   $user->getPrenom().'\n nous confirmons l"ajout de votre constat N°: '.$constat->getId_constat().
                   '\n il est désormé en attente, nous vous notifierons lorsque ce dernier changera d"état');
              // ->attach(Swift_Attachment::fromPath(__DIR__.'/../../../web/images/constat/'.$constat->getImage()));

           $mailer->send($message);
            return $this->redirectToRoute('list_constat');}

        return $this->render('@Assurance\Constat&Accident\AjoutConstat.html.twig', array("contrats"=>$contrats,"cont"=>$cont,
            // ...
        ));
    }
    public function deleteAction($id)
    {
        $em= $this->getDoctrine()->getManager();
        $constat= $this->getDoctrine()->getRepository(constat::class)->find($id);
        $em->remove($constat);
        $em->flush();
        return $this->redirectToRoute("list_constat");
    }

    public function ListConstat_BackAction()
    {
        $user = $this->container->get('security.token_storage')->getToken()->getUser();
        $constats=$this->getDoctrine()->getRepository(constat::class)->findAll();
        dump($constats);
        return $this->render('@Assurance\Constat&Accident\AffichageConstat2.html.twig', array('constats' => $constats,'user' => $user
            // ...
        ));
    }
    public function notifier(constat $constat)
    {
        $contrat1 = new contrat();
        $contrat2 = new contrat();
        $em = $this->getDoctrine()->getManager();
        $contrat1 = $em->getRepository(contrat::class)->find($constat->getIDContratA());
        $contrat2 = $em->getRepository(contrat::class)->find($constat->getIDContratB());
        $notif=new notification();
        $date=new \DateTime();
        $notif->setDateNotif($date);
        $notif->setReceiver($contrat2->getID_client());
        $notif->setSender($contrat1->getID_client());
        $notif->setMessage('test baba');
        $em->persist($notif);
        $em->flush();
    }
    public function SortConstatAction($s)
    {$user = $this->container->get('security.token_storage')->getToken()->getUser();
        $auth_checker = $this->get('security.authorization_checker');
        if($auth_checker->isGranted('ROLE_USER'))
        {
            switch ($s)
            {
                case -1 : $tab = $this->getDoctrine()->getRepository(constat::class)->findByIDRefused($user->getId());
                break;
                case 0 : $tab = $this->getDoctrine()->getRepository(constat::class)->findByIDNotyet($user->getId());
                break;
                case 1 : $tab = $this->getDoctrine()->getRepository(constat::class)->findByIDloading($user->getId());
                break;
                case 2 : $tab = $this->getDoctrine()->getRepository(constat::class)->findByIDDone($user->getId());
            }

            return $this->render('@Assurance\Constat&Accident\AffichageConstat.html.twig', array('constats' => $tab,
                // ...
            ));
        }
        else
        {
            switch ($s)
            {
                case -1 : $tab = $this->getDoctrine()->getRepository(constat::class)->findByRefused();
                    break;
                case 0 : $tab = $this->getDoctrine()->getRepository(constat::class)->findByNotyet();
                    break;
                case 1 : $tab = $this->getDoctrine()->getRepository(constat::class)->findByloading();
                    break;
                case 2 : $tab = $this->getDoctrine()->getRepository(constat::class)->findByDone();
            }
            return $this->render('@Assurance\Constat&Accident\AffichageConstat2.html.twig', array('constats' => $tab,
                // ...
            ));
        };
    }
    public function printpdfAction($id)
    {/*
        $user = $this->container->get('security.token_storage')->getToken()->getUser();
        $id = $user->getId();
        $contrat = new contrat();
        $contrat = $this->getDoctrine()->getManager()->getRepository(contrat::class)->findByIDclient($id);
        $constats=$this->getDoctrine()                 // nous déclarons la variable qui va contenir toutes les voitures
        ->getRepository(constat::class)                // appel du répository en lui précisant l'entité que nous allons travailler sur
        ->findByIDclient($id);
        $this->get('knp_snappy.pdf')->generateFromHtml(
            $this->renderView(
                '@Assurance\Constat&Accident\AffichageConstat.html.twig',array('constats' => $constats,'contrats' =>$contrat
                    // ...
                )
            ),__DIR__.'/../../../web/images/constat/test.pdf');
       $html = $this->renderView("@Assurance\Constat&Accident\AffichageConstat.html.twig",array('constats' => $constats,'contrats' =>$contrat
            // ...
        ));
        $filename= "Custom_pdf_test";
        $resp = new Response($snappy->getOutputFromHtml($html),200,array(
            'Content-Type' => 'application/pdf',
            'Content-Disposition' =>'attachement; filename="'.$filename.'.pdf"'));
        $resp->
        return $this->redirectToRoute("list_constat");*/
    }
    public function ChangeStatut()
    {

    }
    public function AffecterExpertAction($id)
    {

    }
}
