<?php


namespace App\Controller;


use App\Helper\EntidadeFactoryInterface;
use Doctrine\Common\Persistence\ObjectRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

abstract class BaseController extends AbstractController
{
    /**
     * @var EntityManagerInterface
     */
    protected $entityManager;
    /**
     * @var ObjectRepository
     */
    protected $repository;
    /**
     * @var EntidadeFactoryInterface
     */
    protected $factory;

    public function __construct(
        EntityManagerInterface $entityManager,
        ObjectRepository $repository,
        EntidadeFactoryInterface $factory
        //ExtratorDadosRequest $extratorDadosRequest
    ) {
        $this->entityManager = $entityManager;
        $this->repository = $repository;
        $this->factory = $factory;
       // $this->extratorDadosRequest = $extratorDadosRequest;
    }

    /*
    public function novo(Request $request): Response
    {
        $corpoRequisicao = $request->getContent();
        $entidade = $this->factory->criarEntidade($corpoRequisicao);

        $this->entityManager->persist($entidade);
        $this->entityManager->flush();

        return new JsonResponse($entidade);
    }*/

    public function listar(): Response
    {
        return new JsonResponse($this->repository->findAll());
    }

}