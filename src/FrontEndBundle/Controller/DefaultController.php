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
use FrontEndBundle\Repository\GustoRepository;


class DefaultController extends Controller
{
    public function indexAction()
    {
        //$gusti=$this->getDoctrine()->getRepository('FrontEndBundle:Gusto')->findBy([],['nomeGusto'=>'ASC']);
        $gusti=$this->getDoctrine()->getRepository('FrontEndBundle:Gusto')->findAllOrderedByName();
        $regioni=$this->getDoctrine()->getRepository('FrontEndBundle:Regione')->findAll();
        $giorni=['Lunedì'=>'isLunedi','Martedì'=>'isMartedi','Mercoledì'=>'isMercoledi','Giovedì'=>'isGiovedi','Venerdì'=>'isVenerdi','Sabato'=>'isSabato','Domenica'=>'isDomenica'];
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
      $gusti=$this->getDoctrine()->getRepository('FrontEndBundle:Gusto')->findAllOrderedByName();
      $regioni=$this->getDoctrine()->getRepository('FrontEndBundle:Regione')->findAll();
      $giorni=['Lunedì'=>'isLunedi','Martedì'=>'isMartedi','Mercoledì'=>'isMercoledi','Giovedì'=>'isGiovedi','Venerdì'=>'isVenerdi','Sabato'=>'isSabato','Domenica'=>'isDomenica'];

      //raccogliamo i dati della ricerca provenienti dalla home per registrarla
      $em=$this->getDoctrine()->getManager();
      //controlliamo il primo campo gusto

        for($i=1;$i<=3;$i++)
        {
          if($request->request->get("gusto$i")!=0){
            //raccogliamo i dati della prima ricerca
            $dataRicerca=new \DateTime();

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

          //RICERCA VERA E PROPRIA
          //raccolgo tutti i dati provenienti dal form
          $cittaCercata=$request->request->get('city');
          $giorno1=$request->request->get('day1');
          $giorno2=$request->request->get('day2');
          $giorno3=$request->request->get('day3');
          $gusto1=$request->request->get('gusto1');
          $gusto2=$request->request->get('gusto2');
          $gusto3=$request->request->get('gusto3');

          /*
          APPUNTO JOIN SQL
          $sql="SELECT ge
          FROM FrontEndBundle:Gelateria ge
          INNER JOIN gelateria_gusti gg ON ge.id = gg.gelateria_id
          INNER JOIN gusto gu ON gu.id = gg.gusto_id
          WHERE ge.id_citta = $cittaCercata ";
          QUI ANDREBBERO TUTTE LE COSE OPZIONALI
          */

          //costruiamo la query DQL in maniera dinamica
          $dql="SELECT ge
          FROM FrontEndBundle\Entity\Gelateria ge";
          if($gusto1 != 0) $dql.= " JOIN ge.gusti gg ";
          if($gusto2 != 0) $dql.= " JOIN ge.gusti ggg ";
          if($gusto3 != 0) $dql.= " JOIN ge.gusti gggg ";
          $dql.= " WHERE ge.idCitta = $cittaCercata ";

          //se sono indicati i gusti controlliamo
          if($gusto1 != 0) $dql.= " AND gg.id=$gusto1 ";
          if($gusto2 != 0) $dql.= " AND ggg.id=$gusto2 ";
          if($gusto3 != 0) $dql.= " AND gggg.id=$gusto3 ";

          //se sono indicati i giorni controlliamo
          if ($giorno1 !="nessuno") $dql.= " AND ge.$giorno1=true ";
          if ($giorno2 !="nessuno") $dql.= " AND ge.$giorno2=true ";
          if ($giorno3 !="nessuno") $dql.= " AND ge.$giorno3=true ";

          //ordiniamo i risultati in ordine alfabetico sul nome delle gelaterie
          $dql.="ORDER BY ge.nomeGelateria ASC";
          $query=$em->createQuery($dql);
          $gelaterieTrovate=$query->getResult();

        //  var_dump($dql);


      return $this->render('FrontEndBundle:Default:search.html.twig', array(
        'gusti'=>$gusti, //per la tendina
        'regioni'=>$regioni, //per la tendina
        'giorni'=>$giorni, //per la tendina
        'gelaterieTrovate'=>$gelaterieTrovate[0],
        //'numero'=>$gelaterieTrovate[1]
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
