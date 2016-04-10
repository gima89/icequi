<?php

namespace FrontEndBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        $gusti=['Arancia','Pistacchio','Nocciola','Anguria','Fragola','Amarena','Melone','Ciliegie','Nutella'];
        $regioni=['Lombardia','Veneto','Piemonte','Toscana','Umbria','Lazio','Calabria','Sicilia'];
        $province=['Milano','Roma','Torino','Firenze'];
        $cities=['Milano','Roma','Lamezia Terme','Messina','Firenze','Reggio Calabria'];
        $days=['Luned&igrave;','Marted&igrave;','Mercoled&igrave;','Gioved&igrave;','Venerd&igrave;','Sabato','Domenica'];
        $gets=['gusto1','gusto2','gusto3','regione','provincia','city','day1','day2','day3'];
        $categorie=['Creme','Frutta','Altro'];

        return $this->render('FrontEndBundle:Default:index.html.twig', [
          $gusti, $regioni, $province, $cities, $days, $gets, $categorie
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

    public function password_settings()
    {
        return $this->render('FrontEndBundle:Default:password_settings.html.twig');

    }
    public function city_settings()
    {
        return $this->render('FrontEndBundle:Default:city_settings.html.twig');
    }

}
