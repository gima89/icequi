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
use FOS\UserBundle\Doctrine\UserManager;

class AdminController extends Controller
{
    public function successAction(){
      return $this->render('BackEndBundle:Admin:success.html.twig', array(
          // ...
      ));
    }

    public function failureAction(){
      return $this->render('BackEndBundle:Admin:failure.html.twig', array(
          // ...
      ));
    }

    public function settingsAction()
    {
      if( $this->container->get( 'security.authorization_checker' )->isGranted( 'IS_AUTHENTICATED_FULLY' ) )
      {
        $user = $this->container->get('security.token_storage')->getToken()->getUser();
      }

      $regioni=$this->getDoctrine()->getRepository('FrontEndBundle:Regione')->findAll();
        return $this->render('BackEndBundle:Admin:settings.html.twig', array(
            'user'=>$user,
            'regioni'=>$regioni
        ));
    }

    public function changePswAction(Request $request)
    {
      if( $this->container->get( 'security.authorization_checker' )->isGranted( 'IS_AUTHENTICATED_FULLY' ) )
      {
        $user = $this->container->get('security.token_storage')->getToken()->getUser();
      }

      $password=$request->request->get('newpsw');
      $password2=$request->request->get('pswrepeat');
      if($password != $password2) return $this->redirectToRoute('failure');
      $um = $this->container->get('fos_user.user_manager');
      $user->setPlainPassword($password);
      $user->setEnabled('true');
      $um->updateUser($user);
      return $this->redirectToRoute('success');
    }

    public function changeMailAction(Request $request)
    {
      if( $this->container->get( 'security.authorization_checker' )->isGranted( 'IS_AUTHENTICATED_FULLY' ) )
      {
        $user = $this->container->get('security.token_storage')->getToken()->getUser();
      }

      $mail=$request->request->get('newEmail');
      $um = $this->container->get('fos_user.user_manager');
      $user->setEmail($mail);
      $um->updateUser($user);
      return $this->redirectToRoute('success');
    }

    public function provinceFilterAction(Request $request)
    {
        $provincie=$this->getDoctrine()->getRepository('FrontEndBundle:Provincia')->findByIdRegione($request->get('id'));

        return $this->render('BackEndBundle:Admin:favoriteProvinces.html.twig', array(
              'provincie'=>$provincie
        ));
    }

    public function cityFilterAction(Request $request)
    {
        $citta=$this->getDoctrine()->getRepository('FrontEndBundle:Citta')->findByIdProvincia($request->get('id'));

        return $this->render('BackEndBundle:Admin:favoriteCities.html.twig', array(
              'cities'=>$citta
        ));
    }

      public function favoriteCityAction(Request $request)
      {
          $defaultCity=$this->getDoctrine()->getRepository('FrontEndBundle:Citta')->find($request->get('defaultCity'));
          if( $this->container->get( 'security.authorization_checker' )->isGranted( 'IS_AUTHENTICATED_FULLY' ) )
          {$user = $this->container->get('security.token_storage')->getToken()->getUser(); }

          $um=$this->container->get('fos_user.user_manager');
          $user->setIdCittaPredefinita($defaultCity);
          $um->updateUser($user);
          return $this->redirectToRoute('success');
        }

    public function adminManageAction()
    {
        $utenti=$this->container->get('fos_user.user_manager')->findUsers('a:0:{}');

        return $this->render('BackEndBundle:Admin:admin_manage.html.twig', array(
            'utenti'=>$utenti
        ));
    }

    public function addAdminAction(Request $request)
    {
        $newAdmin=$this->getDoctrine()->getRepository('FrontEndBundle:Utente')->find($request->request->get('idToAdd'));

        $um=$this->container->get('fos_user.user_manager');
        $newAdmin->setRoles('a:1:{i:0;s:10:"ROLE_ADMIN";}'); //non lo prende perche ovviamente si aspettta un array
        $um->updateUser($newAdmin);

        return $this->redirectToRoute('success');
    }

    public function delAdminAction(Request $request)
    {
        $oldAdmin=$this->getDoctrine()->getRepository('FrontEndBundle:Utente')->find($request->get('idToDel'));

        $em=$this->getDoctrine()->getManager();
        $oldAdmin->setRoles('a:0:{}');
        $em->persit($oldAdmin);
        $em->flush();

        return $this->redirectToRoute('success');
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
          return $this->redirectToRoute('success');
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
          return $this->redirectToRoute('success');
        }

        return $this->render('BackEndBundle:Admin:upd_gel2.html.twig', array(
            'form'=>$form->createView()
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
          return $this->redirectToRoute('success');
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
            return $this->redirectToRoute('success');
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
            return $this->redirectToRoute('success');
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
