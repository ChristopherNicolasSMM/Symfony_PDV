<?php

namespace App\Controller;

use App\Entity\CategoriaPDV;
use App\Helper\CategoriaPDVFactory;
use App\Helper\ExtratorDadosRequest;
use App\Repository\CategoriaPDVRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class CategoriaPDVController extends BaseController
{
    public function __construct(
    EntityManagerInterface $entityManager,
    CategoriaPDVRepository $repository,
    CategoriaPDVFactory $factory
    //ExtratorDadosRequest $extratorDadosRequest
    )
    {
        parent::__construct($entityManager, $repository, $factory);
    }

    /**
     * @Route("/categoriaPDV", methods={"POST"})
     */
    public function salva(Request $request): Response
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

}
