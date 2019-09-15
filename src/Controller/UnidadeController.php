<?php

namespace App\Controller;

use App\Entity\Unidade;
use App\Repository\UnidadeRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class UnidadeController extends AbstractController
{
    /**
     * @var EntityManagerInterface
     */
    private $entityManager;

    /**
     * @var UnidadeRepository
     */
    private $repository;

    public function __construct(
        EntityManagerInterface $entityManager,
        UnidadeRepository $repository
    ) {
        $this->entityManager = $entityManager;
        $this->repository = $repository;
    }

    /**
     * @Route("/unidade", methods={"POST"})
     */
    public function nova(Request $request): Response
    {
        $dadosRequest = $request->getContent();
        $dadosEmJson = json_decode($dadosRequest);
        if (is_integer($dadosEmJson->codigo) and
            $dadosEmJson->codigo >= 1 ){
            $unidade = $this->repository->find($dadosEmJson->codigo);
        }
        //Cria novo
        if (empty($unidade)){
            $unidade = new Unidade();
            $this->entityManager->persist($unidade);
        }

        $unidade->setUnidadeAbv($dadosEmJson->unidade);
        $unidade->setDescricao($dadosEmJson->descricao);

        $this->entityManager->flush();
        return new JsonResponse($unidade);
    }


    /**
     * @Route("/unidade", methods={"GET"})
     */
    public function listar(): Response
    {
        return new JsonResponse($this->repository->findAll());
    }

}
