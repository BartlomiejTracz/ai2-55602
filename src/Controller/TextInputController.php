<?php

namespace App\Controller;

use App\Form\TextInputType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request; // 1. Dodaj import klasy Request
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class TextInputController extends AbstractController
{
    #[Route('/text/input', name: 'app_text_input')]
    public function index(Request $request): Response // 2. Wstrzyknij $request do metody
    {
        $form = $this->createForm(TextInputType::class, []);
        $submittedText = null;

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $submittedText = $form->get('text')->getData();
        }

        return $this->render('text_input/index.html.twig', [
            'form' => $form,
            'submittedText' => $submittedText,
        ]);
    }
}



//namespace App\Controller;
//
//use App\Form\TextInputType;
//use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
//use Symfony\Component\HttpFoundation\Request;
//use Symfony\Component\HttpFoundation\Response;
//use Symfony\Component\Routing\Attribute\Route;

//class TwojKontrolerController extends AbstractController
//{
//    #[Route('/twoja-sciezka', name: 'app_twoja_nazwa')]
//    public function index(Request $request): Response
//    {
//        // 1. Tworzymy formularz bez encji (przekazujemy pustą tablicę)
//        $form = $this->createForm(TextInputType::class, []);
//
//        // 2. Obsługujemy żądanie HTTP
//        $form->handleRequest($request);
//
//        // 3. Sprawdzamy, czy formularz został wysłany i jest poprawny
//        if ($form->isSubmitted() && $form->isValid()) {
//            // Pobieramy tablicę z danymi ze wszystkich pól
//            $data = $form->getData();
//
//            // Lub pobieramy pojedyncze pole (np. gdyby miało opcję 'mapped' => false):
//            // $tekst = $form->get('nazwa_pola')->getData();
//
//            // TODO: Ręczne przetwarzanie danych z tablicy $data
//
//            // Opcjonalne przekierowanie po sukcesie:
//            // return $this->redirectToRoute('app_twoja_nazwa');
//        }
//
//        // 4. Wyświetlamy formularz w szablonie Twig (np. za pomocą {{ form(form) }})
//        return $this->render('twoj_szablon/index.html.twig', [
//            'form' => $form,
//        ]);
//    }
//}
