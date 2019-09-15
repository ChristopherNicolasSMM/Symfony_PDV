<?php

namespace App\Controller;

use App\Entity\CFOP;
use App\Repository\CFOPRepository;
use App\Repository\NaturezaDeOperacaoRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class CFOPController extends AbstractController
{
    /**
     * @var EntityManagerInterface
     */
    private $entityManager;

    /**
     * @var CFOPRepository
     */
    private $repository;

    /**
     * @var NaturezaDeOperacaoRepository
     */
    private $naturezaDeOperacaoRepository;

    public function __construct(
        EntityManagerInterface $entityManager,
        CFOPRepository $repository,
        NaturezaDeOperacaoRepository $naturezaDeOperacaoRepository
    ) {
        $this->entityManager = $entityManager;
        $this->repository = $repository;
        $this->naturezaDeOperacaoRepository = $naturezaDeOperacaoRepository;
    }

    /**
     * @Route("/cfop", methods={"POST"})
     */
    public function nova(Request $request): Response
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


    /**
     * @Route("/cfop", methods={"GET"})
     */
    public function listar(): Response
    {
        return new JsonResponse($this->repository->findAll());
    }

}
