<?php

namespace UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{


    //redirect  !!
    public function indexAction()
    {
        $authChecker = $this->container->get('security.authorization_checker');

        if($authChecker->isGranted('ROLE_ADMIN')){

            return $this->redirectToRoute('forum_disply');
        }
        else{
            return $this->redirectToRoute('service_homepage');
        }
    }

}
