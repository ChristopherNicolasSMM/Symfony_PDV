<?php

namespace App\Controller;

use App\Entity\Categoria;
use App\Helper\CategoriaFactory;
use App\Repository\CategoriaRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;



class CategoriaController extends BaseController
{
    public function __construct(
        EntityManagerInterface $entityManager,
        CategoriaRepository $repository,
        CategoriaFactory $factory
      //  ExtratorDadosRequest $extratorDadosRequest
    )
    {
       parent::__construct($entityManager, $repository, $factory);
    }

    /**
     * @Route("/categoria", methods={"POST"})
     */
    public function salva(Request $request): Response
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

}


