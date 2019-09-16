<?php

namespace App\Controller;

use App\Entity\Unidade;
use App\Helper\ExtratorDadosRequest;
use App\Helper\UnidadeFactory;
use App\Repository\UnidadeRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class UnidadeController extends BaseController
{
    public function __construct(
        EntityManagerInterface $entityManager,
        UnidadeRepository $repository,
        UnidadeFactory $factory
        //ExtratorDadosRequest $extratorDadosRequest
    ) {
        parent::__construct($entityManager, $repository, $factory);
    }

    /**
     * @Route("/unidade", methods={"POST"})
     */
    public function salva(Request $request): Response
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
}
