<?php

namespace Acme\CashmachineBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('AcmeCashmachineBundle:Default:index.html.twig', array('name' => $name));
    }
}
