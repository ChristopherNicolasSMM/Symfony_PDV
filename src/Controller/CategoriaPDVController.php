<?php

namespace App\Controller;

use App\Entity\CategoriaPDV;
use App\Repository\CategoriaPDVRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class CategoriaPDVController extends AbstractController
{
    /**
     * @var EntityManagerInterface
     */
    private $entityManager;

    /**
     * @var CategoriaPDVRepository
     */
    private $repository;

    public function __construct(
        EntityManagerInterface $entityManager,
        CategoriaPDVRepository $repository
    ) {
        $this->entityManager = $entityManager;
        $this->repository = $repository;
    }

    /**
     * @Route("/categoriaPDV", methods={"POST"})
     */
    public function nova(Request $request): Response
    {
        $dadosRequest = $request->getContent();
        $dadosEmJson = json_decode($dadosRequest);
        if (is_integer($dadosEmJson->codigo) and
            $dadosEmJson->codigo >= 1 ){
            $categoriaPDV = $this->repository->find($dadosEmJson->codigo);
        }
        //Cria novo
        if (empty($categoriaPDV)){
            $categoriaPDV = new CategoriaPDV();
            $this->entityManager->persist($categoriaPDV);
        }

        $categoriaPDV->setDescricao($dadosEmJson->categoria);

        $this->entityManager->flush();
        return new JsonResponse($categoriaPDV);
    }


    /**
     * @Route("/categoriaPDV", methods={"GET"})
     */
    public function listar(): Response
    {
        return new JsonResponse($this->repository->findAll());
    }

}
