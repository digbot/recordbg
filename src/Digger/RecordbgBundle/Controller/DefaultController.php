<?php

namespace Digger\RecordbgBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Doctrine;


class DefaultController extends Controller
{
    public function doPaginate($catid)
    {
	    $em         = $this->get('doctrine.orm.entity_manager');
   	    $repository = $this->getDoctrine()->getRepository('DiggerRecordbgBundle:Objects');
		$listQb     = $repository->getObjectListQb($catid);
	
		$paginator = $this->get('knp_paginator');
		$pagination = $paginator->paginate(
			$listQb,
			$this->get('request')->query->get('page', 1)/*page number*/,
			10/*limit per page*/
		);

		return $pagination;
	}
	
	public function recordsAction()
    {
        return $this->render('DiggerRecordbgBundle:Default:records.html.twig');
    }
	
    public function indexAction($catid=0)
    {
        return $this->render('DiggerRecordbgBundle:Default:center.html.twig', array('pagination' => $this->doPaginate($catid)));
    }

	public function fullitemAction($id)
    {
	//	$em 		= $this->getDoctrine()->getEntityManager();
//	 	$itemObject = $em->find('DiggerRecordbgBundle:Objects', $id);
        $repository = $this->getDoctrine()->getRepository('DiggerRecordbgBundle:Objects');
        $query      = $repository->getFullItemQuery($id);
        $itemObject = $query->getResult();
	//	$itemObject->setHits($itemObject->getHits() + 1);
     //   $em->persist($itemObject);
     //   $em->flush();
  
  //     echo "<pre>";
   //    \Doctrine\Common\Util\Debug::dump($itemObject);
    //    exit();
    //    print_r($itemObject->toArray());
     //      Doctrine\Common\Util\Debug::dump(  $itemObject );
       
	
		return $this->render('DiggerRecordbgBundle:Default:fullitem.html.twig', array('item' => $itemObject));
    }

    public function newAction(Request $request)
    {
        die('zzzz');
        /*
      	$leftMenu = $this->get('digger_recordbg.build_left_menu');

        $Object = new Objects();
        $Object->setCreated(new \DateTime());
   
        $form = $this->createForm(new ObjectType(), $Object);
        
        if ($request->getMethod() == 'POST') {
			$form->bindRequest($request);
			if ($form->isValid()) {
				// perform some action, such as saving the task to the database
				   $Object->setIp($request->getClientIp());
	
				  $em = $this->getDoctrine()->getEntityManager();
				  $em->persist($Object);
				  $em->flush();
				 
				  $message = \Swift_Message::newInstance()
							->setSubject('Symfony 2: new record is added')
							->setFrom('noreplay@recordbg.com')
							->setTo('Dimitar.Sashev@gmail.com')
							->setBody($Object->getInfo());
	
				  $this->get('mailer')->send($message);
	
				return $this->redirect($this->generateUrl('_homepage'));
			 }
        }
            */
		return $this->render('DiggerRecordbgBundle:Default:new.html.twig', array('form' => $form->createView()));
    }

    public function rollmodelAction()
    {
        return $this->render('DiggerRecordbgBundle:Default:center.html.twig', array('pagination' => $this->doPaginate(999)));
    }

	public function topmenuAction()
    {
           $leftMenu = $this->get('digger_recordbg.build_left_menu');

           return $this->render('DiggerRecordbgBundle:Default:topmenu.html.twig', array('leftMenu' => $leftMenu->buildLeftMenu()));
    }
    
	
    public function leftsideAction()
    {
           $leftMenu = $this->get('digger_recordbg.build_left_menu');

           return $this->render('DiggerRecordbgBundle:Default:leftside.html.twig', array('leftMenu' => $leftMenu->buildLeftMenu()));
    }
    
    public function rulesAction()
    {
           $leftMenu = $this->get('digger_recordbg.build_left_menu');
		
           return $this->render('DiggerRecordbgBundle:Default:rules.html.twig', array());
    }
	
    public function feedbackAction()
    {
           return $this->render('DiggerRecordbgBundle:Default:feedback.html.twig', array());
    }


}
