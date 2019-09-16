<?php

namespace App\Controller;

use App\Entity\Marca;
use App\Helper\ExtratorDadosRequest;
use App\Helper\MarcaFactory;
use App\Repository\MarcaRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class MarcaController extends BaseController
{
    public function __construct(
        EntityManagerInterface $entityManager,
        MarcaRepository $repository,
        MarcaFactory $factory
        //ExtratorDadosRequest $extratorDadosRequest
    ) {
        parent::__construct($entityManager, $repository, $factory);
    }

    /**
     * @Route("/marca", methods={"POST"})
     */
    public function salva(Request $request): Response
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
