<?php

Namespace App\Controller\Admin;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;

/**
 * Require ROLE_ADMIN for all the actions of this controller
 *
 * @IsGranted("ROLE_ADMIN")
 */
#[Route('/admin', name:'admin_')]
class HomeController extends AbstractController
{
    #[Route('/home', name:'home')]
    public function home(): Response
    {
        return $this->render('Admin/home.html.twig');
    }
}
?>