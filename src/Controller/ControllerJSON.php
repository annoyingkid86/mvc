<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ControllerJSON
{
    #[Route("/api/lucky/number")]
    public function jsonNumber(): Response
    {
        $number = random_int(0, 100);
        
        $data = [
            'lucky-number' => $number,
            'lucky-message' => 'Hi there!',
        ];
        
        $response = new JsonResponse($data);
        $response->setEncodingOptions(
            $response->getEncodingOptions() | JSON_PRETTY_PRINT
        );
        return $response;
    }
    
    #[Route("/api/quote")]
    public function jsonQuote(): Response
    {
        $quotes = [
            "Stay determined!",
            "Give my regards to the next frog you meet.",
            "Fysikens lagar!",
            "Ny dag, nya möjligheter!",
            "Don't panic!",
            "När man väl har uteslutit det omöjliga måste det som återstår vara sanningen, hur otroligt det än må låta."
        ];
        
        $position = random_int(0, count($quotes)-1);
        
        $date = date(DATE_ATOM);
        $timestamp = strtotime($date);
        
        $date = date("Y-m-d", $timestamp);
        
        $data = [
            'quote' => $quotes[$position],
            'date' => $date,
            'timestamp' => $timestamp
        ];
        
        $response = new JsonResponse($data);
        $response->setEncodingOptions(
            $response->getEncodingOptions() | JSON_PRETTY_PRINT
        );
        return $response;
    }
}
