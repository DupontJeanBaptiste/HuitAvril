<?php

Namespace App\Controller\Commun;

use App\Repository\ItemRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AcceuilController extends AbstractController
{
    #[Route('/', name:'app_acceuil')]
    public function index(ItemRepository $itemRepository): Response
    {
        $items = $itemRepository->findAll();

        return $this->render('Commun/acceuil.html.twig', [
            'items' => $items,
        ]);
    }
}
