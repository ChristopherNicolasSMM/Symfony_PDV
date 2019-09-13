<?php

namespace App\Helper;

use App\Entity\Marca;

class MarcaFactory
{
    public function criarMarca(string $json): Marca
    {
        $dadoEmJson = json_decode($json);

        $marca = new Marca();
        $marca->setMarca($dadoEmJson->marca);

        return $marca;
    }
}