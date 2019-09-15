<?php

namespace App\Controller;

use App\Entity\Categoria;
use App\Repository\CategoriaRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class CategoriaController extends AbstractController
{
    /**
     * @var EntityManagerInterface
     */
    private $entityManager;

    /**
     * @var CategoriaRepository
     */
    private $repository;

    public function __construct(
        EntityManagerInterface $entityManager,
        CategoriaRepository $repository
    ) {
        $this->entityManager = $entityManager;
        $this->repository = $repository;
    }

    /**
     * @Route("/categoria", methods={"POST"})
     */
    public function nova(Request $request): Response
    {
        $dadosRequest = $request->getContent();
        $dadosEmJson = json_decode($dadosRequest);
        if (is_integer($dadosEmJson->codigo) and
            $dadosEmJson->codigo >= 1 ){
            $categoria = $this->repository->find($dadosEmJson->codigo);
        }
        //Cria novo
        if (empty($categoria)){
            $categoria = new Categoria();
            $this->entityManager->persist($categoria);
        }

        $categoria->setCategoria($dadosEmJson->categoria);

        $this->entityManager->flush();
        return new JsonResponse($categoria);
    }


    /**
     * @Route("/categoria", methods={"GET"})
     */
    public function listar(): Response
    {
        return new JsonResponse($this->repository->findAll());
    }

}
