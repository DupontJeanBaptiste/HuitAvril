<?php

Namespace App\Controller\Commun;

use App\Repository\ItemRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Item;
use App\Form\ItemType;
use Symfony\Component\HttpFoundation\Request;

#[Route('/article', name:'app_article_')]
class ArticleController extends AbstractController
{
    #[Route('/show', name:'show')]
    public function show(ItemRepository $itemRepository): Response
    {
        $items = $itemRepository->findAll();

        return $this->render('Commun/article_show.html.twig', [
            'items' => $items,
        ]);
    }

    #[Route('/new', name: 'new')]
    public function new(Request $request, ItemRepository $itemRepository): Response
    {
        $item = new Item();

        $form = $this->createForm(ItemType::class, $item);

        $form->handleRequest($request);

        if ($form->isSubmitted()) {
            $itemRepository->add($item, true);

            return $this->redirectToRoute('app_article_show');
        }

        return $this->renderForm('Commun/article_new.html.twig', [
            'form' => $form,
        ]);
    }

    #[Route('/{id<\d+>}/edit', name: 'edit')]
    public function edit(Request $request, ItemRepository $itemRepository, $id): Response
    {
        $item = $itemRepository->findOneBy(['id' => $id]);

        $form = $this->createForm(ItemType::class, $item);

        $form->handleRequest($request);

        if ($form->isSubmitted()) {
            $itemRepository->add($item, true);

            return $this->redirectToRoute('app_article_show');
        }

        return $this->renderForm('Commun/article_edit.html.twig', [
            'form' => $form,
        ]);
    }
}
