<?php

namespace App\Controller;

use App\Entity\Categoria;
use App\Repository\CategoriaRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;


class CategoriaController extends BaseController
{
    /**
     * @var EntityManagerInterface
     */
    private $entityManager;

    public function __construct(
        EntityManagerInterface $entityManager,
        CategoriaRepository $repository
    ) {
        parent::__construct($repository);
        $this->entityManager = $entityManager;
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

}
