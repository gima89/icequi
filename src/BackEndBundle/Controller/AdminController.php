<?php

namespace BackEndBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

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

    public function updGelAction()
    {
        return $this->render('BackEndBundle:Admin:upd_gel.html.twig', array(
            // ...
        ));
    }

    public function sigGelAction()
    {
        return $this->render('BackEndBundle:Admin:sig_gel.html.twig', array(
            // ...
        ));
    }

    public function addFlavourAction()
    {
        return $this->render('BackEndBundle:Admin:add_flavour.html.twig', array(
            // ...
        ));
    }

    public function updFlavourAction()
    {
        return $this->render('BackEndBundle:Admin:upd_flavour.html.twig', array(
            // ...
        ));
    }

    public function delFlavourAction()
    {
        return $this->render('BackEndBundle:Admin:del_flavour.html.twig', array(
            // ...
        ));
    }

    public function dashboardAction()
    {
        return $this->render('BackEndBundle:Admin:dashboard.html.twig', array(
            // ...
        ));
    }

}
