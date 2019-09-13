<?php


namespace App\Controller;

use App\Entity\Teste;
use PhpParser\JsonDecoder;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TesteController
{

    /**
     * @Route("/teste", methods={"POST"})
     */
    public function novo(Request $request): Response
    {
        $corpoRequisicao = $request->getContent();
        $dadosEmJson = json_decode($corpoRequisicao);

        $teste = new Teste();
        $teste->nome = $corpoRequisicao->teste;

        return new JsonResponse($teste);
    }
}