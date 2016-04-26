<?php

namespace FrontEndBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFOundation\Request;
use FrontEndBundle\Entity\Gusto;
use FrontEndBundle\Entity\Regione;
use FrontEndBundle\Entity\Provincia;
use FrontEndBundle\Entity\Citta;
use FrontEndBundle\Entity\Ricerca;
use FrontEndBundle\Entity\Utente;


class DefaultController extends Controller
{
    public function indexAction()
    {
        $gusti=$this->getDoctrine()->getRepository('FrontEndBundle:Gusto')->findAll();
        $regioni=$this->getDoctrine()->getRepository('FrontEndBundle:Regione')->findAll();
        $giorni=['Lunedì'=>1,'Martedì'=>2,'Mercoledì'=>3,'Giovedì'=>4,'Venerdì'=>5,'Sabato'=>6,'Domenica'=>7];
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
      $giorni=['Lunedì'=>1,'Martedì'=>2,'Mercoledì'=>3,'Giovedì'=>4,'Venerdì'=>5,'Sabato'=>6,'Domenica'=>7];

      //raccogliamo i dati della ricerca provenienti dalla home per registrarla
      $em=$this->getDoctrine()->getManager();
      //controlliamo il primo campo gusto
      for($i=1;$i<=3;$i++)
      {
        if($request->request->get("hpGusto$i")!=0){
          //raccogliamo i dati della prima ricerca
          $data=new \DateTime();
          $dataRicerca=$data->format('d-m-Y');
          $cittaRicerca=$this->getDoctrine()->getRepository('FrontEndBundle:Citta')->find($request->get('hpCitta'));
          $gustoRicerca=$this->getDoctrine()->getRepository('FrontEndBundle:Gusto')->find($request->get("hpGusto$i"));
          $utenteRicerca=null;
          //se c'è un utente loggato lo inseriamo
          if( $this->container->get( 'security.authorization_checker' )->isGranted( 'IS_AUTHENTICATED_FULLY' ) )
          {
            $utenteRicerca = $this->container->get('security.token_storage')->getToken()->getUser();
          }
          //inseriamo i dati della prima ricerca
          $ricerca=new Ricerca();
          $ricerca->setIdCitta($cittaRicerca);
          $ricerca->setDataRicerca($dataRicerca);
          $ricerca->setIdUtente($utenteRicerca);
          $ricerca->setIdGusto($gustoRicerca);
          $em->persist($ricerca);
          $em->flush();
        }}

        for($i=1;$i<=3;$i++)
        {
          if($request->request->get("gusto$i")!=0){
            //raccogliamo i dati della prima ricerca
            $data=new \DateTime();
            $dataRicerca=$data->format('d-m-Y');
            $cittaRicerca=$this->getDoctrine()->getRepository('FrontEndBundle:Citta')->find($request->get('city'));
            $gustoRicerca=$this->getDoctrine()->getRepository('FrontEndBundle:Gusto')->find($request->get("gusto$i"));
            $utenteRicerca=null;
            //se c'è un utente loggato lo inseriamo
            if( $this->container->get( 'security.authorization_checker' )->isGranted( 'IS_AUTHENTICATED_FULLY' ) )
            {
              $utenteRicerca = $this->container->get('security.token_storage')->getToken()->getUser();
            }
            //inseriamo i dati della prima ricerca
            $ricerca=new Ricerca();
            $ricerca->setIdCitta($cittaRicerca);
            $ricerca->setDataRicerca($dataRicerca);
            $ricerca->setIdUtente($utenteRicerca);
            $ricerca->setIdGusto($gustoRicerca);
            $em->persist($ricerca);
            $em->flush();
          }}

          /*
          //g -> gelaterie, f->gusti
          $repository=$em->getRepository('FrontEndBundle:Gelateria');
          $query=$repository->createQueryBuilder('g')
            ->innerJoin('g.gusti','f')
            ->where('f.id = :')

          //gestiamo la vera ricerca
         $query=$em->createQuery(
            "SELECT g
            FROM FrontEndBundle:Gelateria g
            WHERE g.id_citta = $cittaScelta
            ORDER BY g.nome_gelateria DESC'
          )*/


      return $this->render('FrontEndBundle:Default:search.html.twig', array(
        'gusti'=>$gusti, //per la tendina
        'regioni'=>$regioni, //per la tendina
        'giorni'=>$giorni, //per la tendina
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
