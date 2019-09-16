<?php

namespace App\Controller;

use App\Entity\CFOP;
use App\Helper\CFOPFactory;
use App\Helper\ExtratorDadosRequest;
use App\Repository\CFOPRepository;
use App\Repository\NaturezaDeOperacaoRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class CFOPController extends BaseController
{
    /**
     * @var NaturezaDeOperacaoRepository
     */
    private $naturezaDeOperacaoRepository;

    public function __construct(
        EntityManagerInterface $entityManager,
        CFOPRepository $repository,
        CFOPFactory $factory,
        NaturezaDeOperacaoRepository $naturezaDeOperacaoRepository
       // ExtratorDadosRequest $extratorDadosRequest
    ) {
        parent::__construct($entityManager, $repository, $factory);
        $this->naturezaDeOperacaoRepository = $naturezaDeOperacaoRepository;
    }

    /**
     * @Route("/cfop", methods={"POST"})
     */
    public function salva(Request $request): Response
    {
        $dadosRequest = $request->getContent();
        $dadosEmJson = json_decode($dadosRequest);
        if (is_integer($dadosEmJson->codigo) and
            $dadosEmJson->codigo >= 1 ){
            $cfop = $this->repository->find($dadosEmJson->codigo);
        }
        //Cria novo
        if (empty($cfop)){
            $cfop = new CFOP();
            $this->entityManager->persist($cfop);
        }

        $cfop->setDescricao($dadosEmJson->descricao);
        $cfop->setCodCfop($dadosEmJson->cfop);

        $cfop->setNaturezaDeOperacao(
            $this->naturezaDeOperacaoRepository->
            find($dadosEmJson->natureza));

        $cfop->setPadao($dadosEmJson->padrao);

        $this->entityManager->flush();
        return new JsonResponse($cfop);
    }

}
