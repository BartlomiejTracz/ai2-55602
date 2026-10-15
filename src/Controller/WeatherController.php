<?php

namespace App\Controller;

use App\Entity\Location;
use App\Repository\MeasurmentRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class WeatherController extends AbstractController
{
    #[Route('/weather/{city}/{country}', name: 'app_weather')]
public function city(Location $location, MeasurmentRepository $repository): Response
{
    $measurements = $repository->findByLocation($location);
    return $this->render('weather/city.html.twig', [
        'location' => $location,
        'measurements' => $measurements,
    ]);
}
}

//{
//    #[Route('/weather/{id<\d+>}', name: 'app_weather')]
//    public function city(int $id): Response
//    {
//        return $this->render('weather/city.html.twig', [
//            'controller_name' => 'WeatherController',
//        ]);
//    }
//}
