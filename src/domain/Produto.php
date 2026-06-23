<?php

namespace Rodrigotavares\Catalogo\domain;

use Rodrigotavares\Catalogo\domain\VO\SKU;
use Rodrigotavares\Catalogo\domain\VO\Dinheiro;
use Rodrigotavares\Catalogo\domain\exception\PrecoAcimaDoLimiteException;

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

    private function isDobroDe($valor):bool
    {
        //var_dump( $this->getValor()->getCents() * 2 );
        //var_dump($valor);
        //var_dump($this->getValor()->getCents() * 2 >= $valor);
        if($this->getValor()->getCents() * 2 <= $valor):
           return true;
        endif;
        
        return false;
    }

    public function alterarPreco(Dinheiro $novoPreco) :void
    {
        if($this->isDobroDe($novoPreco->getCents())):
            throw new PrecoAcimaDoLimiteException ("O Novo Preço não pode ser Maior ou Igual ao Dobro do Preço Original");
        endif;

        $this->valor = $novoPreco; // ALTERAÇÃO DE ESTADO
    }
}