<?php

namespace DsCorp\Equipo\EquipoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('EquipoBundle:Default:index.html.twig', array('name' => $name));
    }
}
