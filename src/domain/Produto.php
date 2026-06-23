<?php

namespace Rodrigotavares\Catalogo\domain;

use Rodrigotavares\Catalogo\domain\VO\SKU;
use Rodrigotavares\Catalogo\domain\VO\Dinheiro;

Class Produto{
    
    public function __construct(private SKU $sku , private Dinheiro $valor)
    {

    }

    public function getSKU():SKU
    {
        return $this->sku;
    }

    public function getValor():Dinheiro
    {
        return $this->valor;
    }

    public function alterarPreco(Dinheiro $novoPreco) :void
    {
        if($this->valor->multiplyBy($novoPreco)):
            throw new \Exception ("O Novo Preço não pode ser Maior ou Igual ao Dobro do Preço Original");
        endif;

        $this->valor = $novoPreco; // ALTERAÇÃO DE ESTADO
    }
}