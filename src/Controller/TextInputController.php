<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class TextInputController extends AbstractController
{
    #[Route('/text/input', name: 'app_text_input')]
    public function index(): Response
    {
        return $this->render('text_input/index.html.twig', [
            'controller_name' => 'TextInputController',
        ]);
    }
}
