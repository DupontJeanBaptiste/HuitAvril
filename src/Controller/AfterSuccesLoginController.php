<?php

Namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AfterSuccesLoginController extends AbstractController
{
    #[Route('/redirect/route', name:'redirect_route')]
    public function redirectRoute(): Response
    {
        /* 
        */
        $role = $this->getUser()->getRoles()[0];
        if ($role === 'ROLE_ADMIN') {
            return $this->render('Admin/home.html.twig');
        } else {
            return $this->render('Commun/home.html.twig');
        }
    }
}
?>