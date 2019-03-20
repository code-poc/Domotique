<?php

namespace App\Controller;


use App\Repository\PieceRepository;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     * @param PieceRepository $repository
     * @return Response
     * @throws \Twig_Error_Loader
     * @throws \Twig_Error_Runtime
     * @throws \Twig_Error_Syntax
     */
        public function index(PieceRepository $repository): Response
    {
        $pieces = $repository->findBy(['favory'=> 1]);
        return $this->render('pages/home.html.twig', [
            'pieces' => $pieces
        ]);
    }


}