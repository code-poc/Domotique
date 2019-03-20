<?php
namespace App\Controller;

use App\Entity\Piece;
use App\Repository\PieceRepository;
use Doctrine\Common\Persistence\ObjectManager;
use phpDocumentor\Reflection\DocBlock\Tags\Property;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

Class PieceController extends AbstractController
{
    /**
     * @var PieceRepository
     */
    private $repository;

    public function __construct(PieceRepository $repository, ObjectManager $em)
    {
        $this->repository =$repository;
        $this->em = $em;
    }

    /**
     * @Route("/piece", name="piece.index")
     * @return Response
     */
    Public function index(): Response
    {
        $pieces = $this->repository->findAll();
        //$this->em->flush();
        return $this->render('piece/index.html.twig',[

            'current_menu' => 'piece',
            'pieces' => $pieces
        ]);
    }

    /**
     * @Route("/piece/{slug}-{id}", name="piece.show", requirements={"slug": "[a-z0-9\-]*"})
     * @return Response
     */
    public function show(Piece $piece, string $slug): Response
    {
        $getSlug = $piece->getSlug();
        if ($getSlug!== $slug)
        {
            return $this->redirectToRoute('piece.show',[
                'id' => $piece->getId(),
                'slug' => $getSlug
            ],301);
        }
        return $this->render('piece/show.html.twig',[
            'piece' => $piece,
            'current_menu' => 'piece'
        ]);
    }
}