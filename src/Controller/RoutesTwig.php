<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Encoder\JsonDecode;
use Symfony\Component\Form\Console\Descriptor\JsonDescriptor;

class RoutesTwig extends AbstractController
{
    
    private $pages;
    
    private $jsonQuote;
    
    public function __construct() 
    {
        $this->pages = [
            'home','Hem',
            'about', 'Om kursen',
            'lucky_number', 'Turnummer',
            'report', 'Redovisning'
        ];
        
        $this->jsonQuote = new JsonDescriptor('api/quote');
    }
    
    #[Route("/", name: "home")]
    public function home(): Response
    {
        $data = [
            'title' => 'Om mig',
            'pages' => $this->pages,
            'quote' => $this->jsonQuote
        ];
        
        return $this->render('home.html.twig', $data);
    }
    
    #[Route("/about", name: "about")]
    public function about(): Response
    {
        $data = [
            'title' => 'Om kursen',
            'pages' => $this->pages
        ];
        
        return $this->render('about.html.twig', $data);
    }
    
    #[Route("/report", name: "report")]
    public function report(): Response
    {
        $data = [
            'title' => 'Redovisning',
            'pages' => $this->pages
        ];
        
        return $this->render('report.html.twig', $data);
    }
    
    #[Route("/lucky", name: "lucky_number")]
    public function lucky(): Response
    {
        $number = random_int(0, 100);
        $firstImage = random_int(1, 14);
        $secondImage = random_int(1, 14);
        
        $sameNumber = "";
        
        if ($firstImage == $secondImage) {
            $sameNumber = "Oj, spännande! Det verkar som att det blev samma nummer!";
        }
        
        if ($firstImage < 10) {
            $firstImage = '0' . $firstImage;
        }
        
        if ($secondImage < 10) {
            $secondImage = '0' . $secondImage;
        }
        
        $data = [
            'title' => 'Turnummer',
            'number' => $number,
            'first_image' => $firstImage,
            'second_image' => $secondImage,
            'same_number' => $sameNumber,
            'pages' => $this->pages
        ];
        
        return $this->render('lucky.html.twig', $data);
    }
    
    #[Route("/api")]
    public function jsonRoutes(): Response
    {
        
        $jsonRoutes = [
            'api/quote', 'Citat'
        ];
        
        $data = [
            'title' => 'JSON routes',
            'json_routes' => $jsonRoutes,
            'pages' => $this->pages,
            'quote' => $this->jsonQuote
        ];
        
        return $this->render("json_routes.html.twig", $data);
    }
}
