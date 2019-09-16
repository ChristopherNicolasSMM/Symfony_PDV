<?php

namespace App\Controller;

use App\Entity\Composicao;
use App\Helper\ComposicaoFactory;
use App\Helper\ExtratorDadosRequest;
use App\Repository\ComposicaoRepository;
use App\Repository\ProdutoRepository;
use App\Repository\UnidadeRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class ComposicaoController extends BaseController
{
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
        ComposicaoFactory $factory,
        ProdutoRepository $produtoRepository,
        UnidadeRepository $unidadeRepository//,
        //ExtratorDadosRequest $extratorDadosRequest

    ) {
        parent::__construct($entityManager, $repository, $factory);
        $this->produtoRepository = $produtoRepository;
        $this->unidadeRepository = $unidadeRepository;
    }

    /**
     * @Route("/composicao", methods={"POST"})
     */
    public function salva(Request $request): Response
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
}
