<?php

namespace FrontEndBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFOundation\Request;
use FrontEndBundle\Entity\Gusto;
use FrontEndBundle\Entity\Regione;
use FrontEndBundle\Entity\Provincia;
use FrontEndBundle\Entity\Citta;

class DefaultController extends Controller
{
    public function indexAction()
    {
        $gusti=$this->getDoctrine()->getRepository('FrontEndBundle:Gusto')->findAll();
        $regioni=$this->getDoctrine()->getRepository('FrontEndBundle:Regione')->findAll();
        $giorni=['Lunedì','Martedì','Mercoledì','Giovedì','Venerdì','Sabato','Domenica'];
        return $this->render('FrontEndBundle:Default:index.html.twig', [
          'gusti'=>$gusti,
          'regioni'=>$regioni,
          'giorni'=>$giorni
        ]);
    }

    public function hpProvinceFilterAction(Request $request)
    {
        $provincie=$this->getDoctrine()->getRepository('FrontEndBundle:Provincia')->findByIdRegione($request->get('id'));

        return $this->render('FrontEndBundle:Default:hp_provinces.html.twig', array(
              'provincie'=>$provincie
        ));
    }

    public function hpCityFilterAction(Request $request)
    {
        $citta=$this->getDoctrine()->getRepository('FrontEndBundle:Citta')->findByIdProvincia($request->get('id'));

        return $this->render('FrontEndBundle:Default:hp_cities.html.twig', array(
              'cities'=>$citta
        ));
    }

    public function searchAction(Request $request)
    {
      //prepariamo tutti gli array per la tendina nascosta
      $gusti=$this->getDoctrine()->getRepository('FrontEndBundle:Gusto')->findAll();
      $regioni=$this->getDoctrine()->getRepository('FrontEndBundle:Regione')->findAll();
      $giorni=['Lunedì','Martedì','Mercoledì','Giovedì','Venerdì','Sabato','Domenica'];
      return $this->render('FrontEndBundle:Default:search.html.twig', array(
        'gusti'=>$gusti,
        'regioni'=>$regioni,
        'giorni'=>$giorni
      ));
    }

    public function searchProvinceFilterAction(Request $request)
    {
        $provincie=$this->getDoctrine()->getRepository('FrontEndBundle:Provincia')->findByIdRegione($request->get('id'));

        return $this->render('FrontEndBundle:Default:search_provinces.html.twig', array(
              'provincie'=>$provincie
        ));
    }

    public function searchCityFilterAction(Request $request)
    {
        $citta=$this->getDoctrine()->getRepository('FrontEndBundle:Citta')->findByIdProvincia($request->get('id'));

        return $this->render('FrontEndBundle:Default:search_cities.html.twig', array(
              'cities'=>$citta
        ));
    }

    public function favoriteAction()
    {
        $gusti=$this->getDoctrine()->getRepository('FrontEndBundle:Gusto')->findAll();
        $regioni=$this->getDoctrine()->getRepository('FrontEndBundle:Regione')->findAll();
        $giorni=['Lunedì','Martedì','Mercoledì','Giovedì','Venerdì','Sabato','Domenica'];
        return $this->render('FrontEndBundle:Default:favorites.html.twig', [
          'gusti'=>$gusti,
          'regioni'=>$regioni,
          'giorni'=>$giorni
        ]);
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
