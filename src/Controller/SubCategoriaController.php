<?php

namespace App\Controller;

use App\Entity\SubCategoria;
use App\Repository\SubCategoriaRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class SubCategoriaController extends AbstractController
{
    /**
     * @var EntityManagerInterface
     */
    private $entityManager;

    /**
     * @var SubCategoriaRepository
     */
    private $repository;

    public function __construct(
        EntityManagerInterface $entityManager,
        SubCategoriaRepository $repository
    ) {
        $this->entityManager = $entityManager;
        $this->repository = $repository;
    }

    /**
     * @Route("/subCategoria", methods={"POST"})
     */
    public function nova(Request $request): Response
    {
        $dadosRequest = $request->getContent();
        $dadosEmJson = json_decode($dadosRequest);
        if (is_integer($dadosEmJson->codigo) and
            $dadosEmJson->codigo >= 1 ){
            $subCategoria = $this->repository->find($dadosEmJson->codigo);
        }
        //Cria novo
        if (empty($subCategoria)){
            $subCategoria = new SubCategoria();
            $this->entityManager->persist($subCategoria);
        }

        $subCategoria->setSubCategoria($dadosEmJson->subCategoria);

        $this->entityManager->flush();
        return new JsonResponse($subCategoria);
    }


    /**
     * @Route("/subCategoria", methods={"GET"})
     */
    public function listar(): Response
    {
        return new JsonResponse($this->repository->findAll());
    }

}
