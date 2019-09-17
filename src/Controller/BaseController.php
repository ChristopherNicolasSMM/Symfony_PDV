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

    public function listar(Request $request): Response
    {
        if (is_null($request->get('filter'))){
            $filtro = [];
        }else{
            $filtro = $request->get('filter');
        }

        return new JsonResponse($this->repository->findBy(
            $filtro,
            $request->get('sort'),
            $request->get('limit'),
            //quantidade a retornar é a exibição * o limite
            // o ponto do -1 na page é para que posso iniciar em pagina 1 na url
            // no lugar de iniciar com pagina 0 sendo mais amigavel
            (($request->get('page') -1 ) * $request->get('limit'))
        ));
    }

}