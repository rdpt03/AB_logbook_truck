<?php

namespace App\Controller;

use App\Repository\PathRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/')]
class IndexController extends AbstractController
{

    #[Route('/', name: 'index')]
    public function index(PathRepository $pathRepository): Response
    {
        if($this->getUser()){
            return $this->redirectToRoute("path_index");
        }
        else{
            return $this->redirectToRoute("app_login");
        }
    }
}