<?php

namespace AssuranceBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AdminController extends Controller
{
    public function adminAction()
    {
        $this->denyAccessUnlessGranted('ROLE_ADMIN');
        return $this->render('@Assurance\Admin\admin.html.twig', array(

        ));
    }

}
