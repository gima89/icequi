<?php

namespace BackEndBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use FrontEndBundle\Entity\Gusto;
use FrontEndBundle\Entity\Gelateria;
use FrontEndBundle\Entity\Utente;
use FrontEndBundle\Form\GustoType;
use FrontEndBundle\Form\GelateriaType;
use Symfony\Component\HttpFOundation\Request;
use Symfony\Component\HttpFOundation\Response;

class AdminController extends Controller
{
    public function settingsAction()
    {
        return $this->render('BackEndBundle:Admin:settings.html.twig', array(
            // ...
        ));
    }

    public function adminManageAction()
    {
        $utenti=$this->getDoctrine()->getRepository('FrontEndBundle:Utente')->findByRoles('a:0:{}');
        $admins=$this->getDoctrine()->getRepository('FrontEndBundle:Utente')->findByRoles('a:1:{i:0;s:10:"ROLE_ADMIN";}');

        return $this->render('BackEndBundle:Admin:admin_manage.html.twig', array(
            'utenti'=>$utenti,
            'admins'=>$admins
        ));
    }

    public function addAdminAction(Request $request)
    {
        $newAdmin=$this->getDoctrine()->getRepository('FrontEndBundle:Utente')->find($request->request->get('idToAdd'));

        $em=$this->getDoctrine()->getManager();
        $newAdmin->setRoles('a:1:{i:0;s:10:"ROLE_ADMIN";}');
        $em->persist($newAdmin);
        $em->flush();

        return $this->rendirectToRoute('admin_manage');
    }

    public function delAdminAction(Request $request)
    {
        $oldAdmin=$this->getDoctrine()->getRepository('FrontEndBundle:Utente')->find($request->get('idToDel'));

        $em=$this->getDoctrine()->getManager();
        $oldAdmin->setRoles('a:0:{}');
        $em->persit($oldAdmin);
        $em->flush();

        return $this->rendirectToRoute('admin_manage');
    }

    public function addGelAction(Request $request)
    {
        $gelateria=new Gelateria();
        $form=$this->createForm(GelateriaType::class, $gelateria);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
          $em=$this->getDoctrine()->getManager();
          $em->persist($gelateria);
          $em->flush();
        }

        return $this->render('BackEndBundle:Admin:add_gel.html.twig', array(
            'form'=>$form->createView()
        ));
    }

    public function updGelAction()
    {
        $regioni=$this->getDoctrine()->getRepository('FrontEndBundle:Regione')->findAll();


        return $this->render('BackEndBundle:Admin:upd_gel.html.twig', array(
              'regioni'=>$regioni
        ));
    }

    public function updGelProvinceAction(Request $request)
    {
        $provincie=$this->getDoctrine()->getRepository('FrontEndBundle:Provincia')->findByIdRegione($request->get('id'));


        return $this->render('BackEndBundle:Admin:upd_gel_province.html.twig', array(
              'provincie'=>$provincie
        ));
    }

    public function updGelCittaAction(Request $request)
    {
        $citta=$this->getDoctrine()->getRepository('FrontEndBundle:Citta')->findByIdProvincia($request->get('id'));


        return $this->render('BackEndBundle:Admin:upd_gel_citta.html.twig', array(
              'cities'=>$citta
        ));
    }

    public function updGelListAction(Request $request)
    {
        $gelaterie=$this->getDoctrine()->getRepository('FrontEndBundle:Gelateria')->findByIdCitta($request->get('id'));


        return $this->render('BackEndBundle:Admin:upd_gel_list.html.twig', array(
              'gelaterie'=>$gelaterie
        ));
    }


    public function updGel2Action(Request $request)
    {
        $gelateria=$this->getDoctrine()->getRepository('FrontEndBundle:Gelateria')->find($request->get('gelToUpdate'));
        $form=$this->createForm(GelateriaType::class, $gelateria);
        $form->handleRequest($request);

        if(!$gelateria) throw $this->createNotFoundException('Gelateria inesistente');

        if($form->isSubmitted() && $form->isValid()){
          $em=$this->getDoctrine()->getManager();
          $em->persist($gelateria);
          $em->flush();
        }

        return $this->render('BackEndBundle:Admin:upd_gel2.html.twig', array(
            'form'=>$form->createView()
        ));
    }

    public function updGel3Action()
    {
        return $this->render('BackEndBundle:Admin:upd_gel3.html.twig', array(
            // ...
        ));
    }

    public function sigGelAction()
    {
        return $this->render('BackEndBundle:Admin:sig_gel.html.twig', array(
            // ...
        ));
    }

    public function addFlavourAction(Request $request)
    {
        $gusto = new Gusto();

        $form=$this->createForm(GustoType::class, $gusto);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()){
          $em=$this->getDoctrine()->getManager();
          $em->persist($gusto);
          $em->flush();
        }

        return $this->render('BackEndBundle:Admin:add_flavour.html.twig', array(
            'form'=>$form->createView()
        ));
    }

    public function updFlavourAction()
    {
        $gusti=$this->getDoctrine()->getRepository('FrontEndBundle:Gusto')->findAll();

        return $this->render('BackEndBundle:Admin:upd_flavour.html.twig', array(
            'gusti'=>$gusti,
        ));
      }

    public function updFlavourFormAction(Request $request) {
        $gusto = $this->getDoctrine()->getRepository('FrontEndBundle:Gusto')->find($request->get('id'));
        $form=$this->createForm(GustoType::class, $gusto);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $em=$this->getDoctrine()->getManager();
            $em->persist($gusto);
            $em->flush();
        }

        return $this->render('BackEndBundle:Admin:updFlavourForm.html.twig', array(
            'form'=>$form->createView(),
            'gusto'=>$gusto
        ));
    }

    public function editaGustoAction(Request $request) {
        $gusto = $this->getDoctrine()->getRepository('FrontEndBundle:Gusto')->find($request->get('idSelected'));
        $form=$this->createForm(GustoType::class, $gusto);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $em=$this->getDoctrine()->getManager();
            $em->persist($gusto);
            $em->flush();
        }

        return $this->redirectToRoute('upd_flavour', array(
        ));
    }


    public function delFlavourFormAction()
    {
        $gusti=$this->getDoctrine()->getRepository('FrontEndBundle:Gusto')->findAll();


        return $this->render('BackEndBundle:Admin:del_flavourForm.html.twig', array(
            'gusti'=>$gusti
        ));
    }

    public function delFlavourAction(Request $request)
    {
        $gusto=$this->getDoctrine()->getRepository('FrontEndBundle:Gusto')->find($request->get('idToDelete'));
        if(!$gusto){
          throw $this->createNotFoundException('Gusto non esistente');
        }
        $em=$this->getDoctrine()->getManager();
        $em->remove($gusto);
        $em->flush();
        return $this->redirectToRoute('del_flavourForm', array(
        ));
    }

    public function dashboardAction()
    {
        return $this->render('BackEndBundle:Admin:dashboard.html.twig', array(
            // ...
        ));
    }

}
