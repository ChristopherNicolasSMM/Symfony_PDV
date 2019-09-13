<?php

namespace App\Controller;

use App\Entity\Marca;
use App\Repository\MarcaRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class MarcaController extends AbstractController
{
    /**
     * @var EntityManagerInterface
     */
    private $entityManager;

    /**
     * @var MarcaRepository
     */
    private $repository;

    public function __construct(
        EntityManagerInterface $entityManager,
        MarcaRepository $repository
    ) {
        $this->entityManager = $entityManager;
        $this->repository = $repository;
    }

    /**
     * @Route("/marca2", methods={"POST"})
     */
    public function salvar(Request $request): Response
    {
        $corpoRequisicao = $request->getContent();
        $dadosEmJson = json_decode($corpoRequisicao);

//        if (is_null($dadosEmJson->id)){
//            echo("IF");
            $marca = new Marca();
            $this->entityManager->persist($marca);
//        }
//        else{
//            echo("else");
//            $marca = $this->repository->find($dadosEmJson->id);
//        }

        //$marca->setMarca($dadosEmJson->marca);

        //$this->entityManager->flush();
        return new JsonResponse($marca);
    }

    /**
     * @Route("/marca", methods={"POST"})
     */
    public function nova(Request $request): Response
    {
        $dadosRequest = $request->getContent();
        $dadosEmJson = json_decode($dadosRequest);
        if (is_integer($dadosEmJson->codigo) and
            $dadosEmJson->codigo >= 1 ){
            $marca = $this->repository->find($dadosEmJson->codigo);
        }
        //Cria novo
        if (empty($marca)){
            $marca = new Marca();
            $this->entityManager->persist($marca);
        }

        $marca->setMarca($dadosEmJson->marca);

        $this->entityManager->flush();
        return new JsonResponse($marca);
    }


    /**
     * @Route("/marca", methods={"GET"})
     */
    public function listar(): Response
    {
        return new JsonResponse($this->repository->findAll());
    }

}
