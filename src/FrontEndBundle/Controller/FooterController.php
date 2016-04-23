<?php

namespace FrontEndBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use FrontEndBundle\Entity\Segnalazione;
use FrontEndBundle\Entity\Regione;
use FrontEndBundle\Entity\Citta;
use Symfony\Component\HttpFOundation\Request;
use Symfony\Component\HttpFOundation\Response;

class FooterController extends Controller
{
    public function segnalaAction()
    {
        $regioni=$this->getDoctrine()->getRepository('FrontEndBundle:Regione')->findAll();

        return $this->render('FrontEndBundle:Footer:segnala.html.twig', array(
            'regioni'=>$regioni
        ));
    }

    public function segnalaProvinciaAction(Request $request)
    {
        $provincie=$this->getDoctrine()->getRepository('FrontEndBundle:Provincia')->findByIdRegione($request->get('id'));

        return $this->render('FrontEndBundle:Footer:segnala_provincie.html.twig', array(
              'provincie'=>$provincie
        ));
    }

    public function segnalaCittaAction(Request $request)
    {
        $citta=$this->getDoctrine()->getRepository('FrontEndBundle:Citta')->findByIdProvincia($request->get('id'));

        return $this->render('FrontEndBundle:Footer:segnala_citta.html.twig', array(
              'cities'=>$citta
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
