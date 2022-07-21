<?php

Namespace App\Controller\Commun;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class LogginController extends AbstractController
{
    #[Route('/', name:'loggin')]
    public function loggin(): Response
    {
        return $this->render('Commun/loggin.html.twig');
    }
}
?>