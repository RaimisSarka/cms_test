<?php

namespace App\Controller;

use App\Entity\MenuItemsTop;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class BasicContentController extends AbstractController
{
    /**
     * @Route("/basic/content", name="basic_content")
     */
    public function index()
    {   

			$repository = $this->getDoctrine()->getRepository(MenuItemsTop::class);
    		$fetched_items = $repository->findAll();  
    		#var_dump ($fetched_items[0]);  
    
        return $this->render('basic/content.html.twig', [
            'header_title' => 'NL Galery',
            'message' => 'Welcome to your new controller!',
            'fetched_items' => $fetched_items,
            
        ]);
    }
}
