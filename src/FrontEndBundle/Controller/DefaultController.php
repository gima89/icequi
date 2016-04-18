<?php

namespace FrontEndBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        
        return $this->render('FrontEndBundle:Default:index.html.twig', [

        ]);
    }

    public function searchAction()
    {

        return $this->render('FrontEndBundle:Default:search.html.twig');
    }

    public function favoriteAction()
    {
        return $this->render('FrontEndBundle:Default:favorites.html.twig');
    }

    public function password_settingsAction()
    {
        return $this->render('FrontEndBundle:Default:password_settings.html.twig');

    }
    public function city_settingsAction()
    {
        return $this->render('FrontEndBundle:Default:city_settings.html.twig');
    }

}
