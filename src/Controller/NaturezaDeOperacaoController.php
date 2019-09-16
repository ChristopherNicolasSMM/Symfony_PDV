<?php

namespace App\Controller;

use App\Entity\NaturezaDeOperacao;
use App\Repository\NaturezaDeOperacaoRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class NaturezaDeOperacaoController extends BaseController
{
    /**
     * @var EntityManagerInterface
     */
    private $entityManager;

    public function __construct(
        EntityManagerInterface $entityManager,
        NaturezaDeOperacaoRepository $repository
    ) {
        parent::__construct($repository);
        $this->entityManager = $entityManager;
    }

    /**
     * @Route("/naturezaDeOperacao", methods={"POST"})
     */
    public function nova(Request $request): Response
    {
        $dadosRequest = $request->getContent();
        $dadosEmJson = json_decode($dadosRequest);
        if (is_integer($dadosEmJson->codigo) and
            $dadosEmJson->codigo >= 1 ){
            $naturezaDeOperacao = $this->repository->find($dadosEmJson->codigo);
        }
        //Cria novo
        if (empty($naturezaDeOperacao)){
            $naturezaDeOperacao = new NaturezaDeOperacao();
            $this->entityManager->persist($naturezaDeOperacao);
        }

        $naturezaDeOperacao->setNome($dadosEmJson->nome);
        $naturezaDeOperacao->setDescricao($dadosEmJson->descricao);
        $naturezaDeOperacao->setAbreviacaoCod($dadosEmJson->abv);
        $naturezaDeOperacao->setTipo($dadosEmJson->tipo);
        $naturezaDeOperacao->setDentroDoEstado($dadosEmJson->dentroEstado);
        $naturezaDeOperacao->setPropria($dadosEmJson->propria);
        $naturezaDeOperacao->setStatus($dadosEmJson->status);

        $this->entityManager->flush();
        return new JsonResponse($naturezaDeOperacao);
    }


    /**
     * @Route("/naturezaDeOperacao", methods={"GET"})
     */
    public function listar(): Response
    {
        return new JsonResponse($this->repository->findAll());
    }

}
