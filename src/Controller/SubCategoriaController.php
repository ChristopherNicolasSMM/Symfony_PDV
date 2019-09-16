<?php

namespace App\Controller;

use App\Entity\SubCategoria;
use App\Helper\ExtratorDadosRequest;
use App\Helper\SubCategoriaFactory;
use App\Repository\SubCategoriaRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class SubCategoriaController extends BaseController
{
    public function __construct(
        EntityManagerInterface $entityManager,
        SubCategoriaRepository $repository,
        SubCategoriaFactory $factory
        //ExtratorDadosRequest $extratorDadosRequest
    ) {
        parent::__construct($entityManager, $repository, $factory);
    }

    /**
     * @Route("/subCategoria", methods={"POST"})
     */
    public function salva(Request $request): Response
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
}
