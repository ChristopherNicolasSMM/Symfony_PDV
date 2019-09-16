<?php


namespace App\Controller;


use Doctrine\Common\Persistence\ObjectRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

abstract class BaseController extends AbstractController
{

    /**
     * @var ObjectRepository
     */
    protected $repository;

    public function __construct(ObjectRepository $repository)
    {

        $this->repository = $repository;
    }

    public function listar(): Response
    {
        return new JsonResponse($this->repository->findAll());
    }

}