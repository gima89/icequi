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

        ));
    }

    public function contattaAction(Request $request)
    {
        $testo=$request->request->get('testo');
        $data=date("d-m-Y ");
        $ora=date("h:i:s");

        /*$destinatario="marcolanciesn@gmail.com".",";
        $destinatario.="giacomo.marolla@gmail.com";
        $oggetto="Ricchiesta di contatto su Icequi del $data $ora";
        $intestazione="MIME-Version: 1.0\r\n";
        $intestazione.="Content-type: text/html; charset=iso-8859-1\r\n";
        $intestazione.="From: contactsystem@icequi.it" . "\r\n" . "Reply-To: marcolanciesn@gmail.it";
        mail($destinatario, $oggetto, $testo, $intestazione);*/


        $message = \Swift_Message::newInstance()
        ->setSubject('Un utente ti ha contattato')
        ->setFrom('icequisystem@icequi.it')
        ->setTo('marcolanciesn@gmail.it')
        ->setBody(
        $this->renderView(
            ':email:mailcontattato.html.twig',
            ['testo'=>$testo, 'data'=>date("d-m-Y"), 'ora'=>date('h:i:s')]
          ),
          'text/html'
        );
        $this->get('mailer')->send($message);



        return $this->render(':email:success.html.twig', array(

        ));
    }

}
