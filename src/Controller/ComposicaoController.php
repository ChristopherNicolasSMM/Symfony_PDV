<?php

namespace App\Controller;

use App\Entity\Composicao;
use App\Repository\ComposicaoRepository;
use App\Repository\ProdutoRepository;
use App\Repository\UnidadeRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class ComposicaoController extends AbstractController
{
    /**
     * @var EntityManagerInterface
     */
    private $entityManager;

    /**
     * @var ComposicaoRepository
     */
    private $repository;
    /**
     * @var ProdutoRepository
     */
    private $produtoRepository;
    /**
     * @var UnidadeRepository
     */
    private $unidadeRepository;

    public function __construct(
        EntityManagerInterface $entityManager,
        ComposicaoRepository $repository,
        ProdutoRepository $produtoRepository,
        UnidadeRepository $unidadeRepository

    ) {
        $this->entityManager = $entityManager;
        $this->repository = $repository;
        $this->produtoRepository = $produtoRepository;
        $this->unidadeRepository = $unidadeRepository;
    }

    /**
     * @Route("/composicao", methods={"POST"})
     */
    public function nova(Request $request): Response
    {
        $dadosRequest = $request->getContent();
        $dadosEmJson = json_decode($dadosRequest);
        if (is_integer($dadosEmJson->codigo) and
            $dadosEmJson->codigo >= 1 ){
            $composicao = $this->repository->find($dadosEmJson->codigo);
        }
        //Cria novo
        if (empty($composicao)){
            $composicao = new Composicao();
            $this->entityManager->persist($composicao);
        }

        $composicao->setProduto($this->produtoRepository->find(
            $dadosEmJson->produto));

        $composicao->setUnidade($this->unidadeRepository->find(
            $dadosEmJson->unidade));

        $composicao->setQuantidade($dadosEmJson->quantidade);
        $composicao->setCusto($dadosEmJson->custo);
        $composicao->setCustoTotal($dadosEmJson->custoTotal);
        $composicao->setSubItem($dadosEmJson->subItem);

        $this->entityManager->flush();
        return new JsonResponse($composicao);
    }


    /**
     * @Route("/composicao", methods={"GET"})
     */
    public function listar(): Response
    {
        return new JsonResponse($this->repository->findAll());
    }

}
