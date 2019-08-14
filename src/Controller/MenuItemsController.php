<?php

namespace App\Controller;

use App\Entity\MenuItemsTop;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\HttpFoundation\Request;

class MenuItemsController extends AbstractController
{
    /**
     * @Route("/menu/items", name="menu_items")
     */
    public function index(Request $request)
    {

		$menuItem = new MenuItemsTop();
		
		$form = $this->createFormBuilder($menuItem)
			->add('title', TextType::class)
			->add('path_href', TextType::class)
			->add('img_path', TextType::class)
			->add('list_order_number', IntegerType::class)
			->add('alt', TextType::class)
			->add('add', SubmitType::class, ['label' => 'Add item'])
			->getForm();

		$form->handleRequest($request);		
			
		if ($form->isSubmitted() && $form->isValid()) {
        	$menuItem = $form->getData();
        	$entityManager = $this->getDoctrine()->getManager();
   		$entityManager->persist($menuItem);
			$entityManager->flush();

        	#return new Response('Saved new item with id '.$menuItem->getId());
    	}	    	
    	
    	$repository = $this->getDoctrine()->getRepository(MenuItemsTop::class);
    	$fetched_items = $repository->findAll();
    	
      return $this->render('menu_items/index.html.twig', [
      	'header_title' => 'NL Galery',
      	'controller_name' => 'MenuItemsController',
      	'form' => $form->createView(),
      	'fetched_items' => $fetched_items,
      ]);
    }
    
    public function deleteMenuItem($id) 
    {
    	$entityManager = $this->getDoctrine()->getManager();
    	$menuItem = $entityManager->getRepository(MenuItemsTop::class)->find($id);
    	
    	if (!$menuItem) {
        throw $this->createNotFoundException(
            'No menu item found for id '.$id
        );
    	}
    	
    	$entityManager->remove($menuItem);
		$entityManager->flush();
		
		return $this->redirect($this->generateUrl('menu_items'));
		
		return new Response('Deleted menu item '.$id); 
    }
    
    /**
     * @Route("/menu/items/create/", name="menu_items")
     */
   public function createMenuItem($title, $path_href, $img_path, $list_order_number, $alt) : Response
   {
   	$entityManager = $this->getDoctrine()->getManager();
   	$menuItems = new MenuItemsTop();
   	
   	$menuItems->setTitle($title);
   	$menuItems->setPathHref($path_href);
   	$menuItems->setImgPath($img_path);
   	$menuItems->setListOrderNumber($list_order_number);
   	$menuItems->setAlt($alt);
   	
   	$entityManager->persist($menuItems);
		$entityManager->flush();
   	
   	return new Respose('Saved new menu item '.$menuItems.getId()); 	 	
	}
	
	
}