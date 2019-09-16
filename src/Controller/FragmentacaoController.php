<?php

namespace App\Controller;

use App\Entity\Fragmentacao;
use App\Repository\FragmentacaoRepository;
use App\Repository\ProdutoRepository;
use App\Repository\UnidadeRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class FragmentacaoController extends BaseController
{
    /**
     * @var EntityManagerInterface
     */
    private $entityManager;
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
        FragmentacaoRepository $repository,
        ProdutoRepository $produtoRepository,
        UnidadeRepository $unidadeRepository

    ) {
        parent::__construct($repository);
        $this->entityManager = $entityManager;
        $this->produtoRepository = $produtoRepository;
        $this->unidadeRepository = $unidadeRepository;
    }

    /**
     * @Route("/fragmentacao", methods={"POST"})
     */
    public function nova(Request $request): Response
    {
        $dadosRequest = $request->getContent();
        $dadosEmJson = json_decode($dadosRequest);
        if (is_integer($dadosEmJson->codigo) and
            $dadosEmJson->codigo >= 1 ){
            $fragmentacao = $this->repository->find($dadosEmJson->codigo);
        }
        //Cria novo
        if (empty($fragmentacao)){
            $fragmentacao = new Fragmentacao();
            $this->entityManager->persist($fragmentacao);
        }

        $fragmentacao->setProduto($this->produtoRepository->find(
            $dadosEmJson->produto));

        $fragmentacao->setUnidade($dadosEmJson->unidade);

        $fragmentacao->setQuantidade($dadosEmJson->quantidade);
        $fragmentacao->setPrecoParcial($dadosEmJson->precoParcial);

        $this->entityManager->flush();
        return new JsonResponse($fragmentacao);
    }
}
