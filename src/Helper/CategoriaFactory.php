<?php


namespace App\Helper;

use App\Entity\Categoria;

class CategoriaFactory implements EntidadeFactoryInterface
{
    public function criarEntidade(string $json)
    {
        $dadosEmJson = json_decode($json);
        $categoria = new Categoria();
        $categoria->setCategoria($dadosEmJson->categoria);

        return $categoria;
    }
}