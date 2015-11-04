<?php

namespace DsCorp\Empresa\EmpresaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('EmpresaBundle:Default:index.html.twig', array('name' => $name));
    }
}
