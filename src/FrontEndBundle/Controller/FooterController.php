<?php

namespace FrontEndBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class FooterController extends Controller
{
    public function segnalaAction()
    {
        return $this->render('FrontEndBundle:Footer:segnala.html.twig', array(
            // ...
        ));
    }

    public function chisiamoAction()
    {
        return $this->render('FrontEndBundle:Footer:chisiamo.html.twig', array(
            // ...
        ));
    }

    public function privacyAction()
    {
        return $this->render('FrontEndBundle:Footer:privacy.html.twig', array(
            // ...
        ));
    }

    public function contattiAction()
    {
        return $this->render('FrontEndBundle:Footer:contatti.html.twig', array(
            // ...
        ));
    }

}
