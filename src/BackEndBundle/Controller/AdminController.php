<?php

namespace BackEndBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use FrontEndBundle\Entity\Gusto;
use FrontEndBundle\Form\GustoType;
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
        return $this->render('BackEndBundle:Admin:admin_manage.html.twig', array(
            // ...
        ));
    }

    public function addGelAction()
    {
        return $this->render('BackEndBundle:Admin:add_gel.html.twig', array(
            // ...
        ));
    }

    public function addGel2Action()
    {
        return $this->render('BackEndBundle:Admin:add_gel2.html.twig', array(
            // ...
        ));
    }

    public function updGelAction()
    {
        return $this->render('BackEndBundle:Admin:upd_gel.html.twig', array(
            // ...
        ));
    }

    public function updGel2Action()
    {
        return $this->render('BackEndBundle:Admin:upd_gel2.html.twig', array(
            // ...
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

    public function delFlavourFormAction()
    {
        $gusti=$this->getDoctrine()->getRepository('FrontEndBundle:Gusto')->findAll();


        return $this->render('BackEndBundle:Admin:del_flavourForm.html.twig', array(
            'gusti'=>$gusti
        ));
    }

    public function delFlavourAction(Request $request)
    {
        $gusto=$this->getDoctrine()->getRepository('FrontEndBundle:Gusto')->find($request->request->get('idToDelete'));
        if(!$gusto){
          throw $this->createNotFoundException('Gusto non esistente');
        }
        $em=$this->getDoctrine()->getManager();
        $em->remove($gusto);
        $em->flush();
        return $this->redirectToRoute('delFlavourForm', array(
        ));
    }

    public function dashboardAction()
    {
        return $this->render('BackEndBundle:Admin:dashboard.html.twig', array(
            // ...
        ));
    }

}
