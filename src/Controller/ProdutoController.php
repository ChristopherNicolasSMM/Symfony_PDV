<?php

namespace App\Controller;

use App\Entity\Produto;
use App\Repository\CategoriaPDVRepository;
use App\Repository\CategoriaRepository;
use App\Repository\MarcaRepository;
use App\Repository\ProdutoRepository;
use App\Repository\SubCategoriaRepository;
use App\Repository\UnidadeRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class ProdutoController extends BaseController
{
    /**
     * @var EntityManagerInterface
     */
    private $entityManager;
    /**
     * @var UnidadeRepository
     */
    private $unidadeRepository;
    /**
     * @var CategoriaRepository
     */
    private $categoriaRepository;
    /**
     * @var CategoriaPDVRepository
     */
    private $categoriaPDVRepository;
    /**
     * @var SubCategoriaRepository
     */
    private $subCategoriaRepository;
    /**
     * @var MarcaRepository
     */
    private $marcaRepository;


    public function __construct(
        EntityManagerInterface $entityManager,
        ProdutoRepository $repository,
        UnidadeRepository $unidadeRepository,
        CategoriaRepository $categoriaRepository,
        CategoriaPDVRepository $categoriaPDVRepository,
        SubCategoriaRepository $subCategoriaRepository,
        MarcaRepository $marcaRepository

    ) {
        parent::__construct($repository);
        $this->entityManager = $entityManager;
        $this->unidadeRepository = $unidadeRepository;
        $this->categoriaRepository = $categoriaRepository;
        $this->categoriaPDVRepository = $categoriaPDVRepository;
        $this->subCategoriaRepository = $subCategoriaRepository;
        $this->marcaRepository = $marcaRepository;
    }

    /**
     * @Route("/produto", methods={"POST"})
     */
    public function nova(Request $request): Response
    {
        $dadosRequest = $request->getContent();
        $dadosEmJson = json_decode($dadosRequest);
        if (is_integer($dadosEmJson->codigo) and
            $dadosEmJson->codigo >= 1 ){
            $produto = $this->repository->find($dadosEmJson->codigo);
        }
        //Cria novo
        if (empty($produto)){
            $produto = new Produto();
            $this->entityManager->persist($produto);
        }

        $produto->setUnidade(
            $this->unidadeRepository->find(
                $dadosEmJson->unidade_id));

        $produto->setCategoria(
            $this->categoriaRepository->find(
                $dadosEmJson->categoria_id));

        $produto->setSubCategoria(
            $this->subCategoriaRepository->find(
                $dadosEmJson->sub_categoria_id));

        $produto->setMarca(
            $this->marcaRepository->find(
                $dadosEmJson->marca_id));

        $produto->setEan($dadosEmJson->ean);
        $produto->setDescricao($dadosEmJson->descricao);
        $produto->setTipoItem($dadosEmJson->tipo_item);
        $produto->setModelo($dadosEmJson->modelo);
        $produto->setTags($dadosEmJson->tags);
        $produto->setCodBalanca($dadosEmJson->cod_balanca);
        $produto->setCodInterno($dadosEmJson->cod_interno);
        $produto->setPrecoCusto($dadosEmJson->preco_custo);
        $produto->setPrecoVarejo($dadosEmJson->preco_varejo);
        $produto->setPrecoAtacado($dadosEmJson->preco_atacado);
        $produto->setQntAtacado($dadosEmJson->qnt_atacado);
        $produto->setMovEstoque($dadosEmJson->mov_estoque);
        $produto->setTipEstoque($dadosEmJson->tip_estoque);
        $produto->setTipoProduto($dadosEmJson->tipo_produto);
        $produto->setNcm($dadosEmJson->ncm);
        $produto->setOrigem($dadosEmJson->origem);
        $produto->setCest($dadosEmJson->cest);
        $produto->setCategoriaPDV($dadosEmJson->categoria_pdv);
        $produto->setRotuloPDV($dadosEmJson->rotulo_pdv);
        $produto->setTagsPDV($dadosEmJson->tags_pdv);
        $produto->setStatus($dadosEmJson->status);

        $this->entityManager->flush();
        return new JsonResponse($produto);
    }
}
