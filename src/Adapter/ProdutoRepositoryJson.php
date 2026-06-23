<?php

namespace Rodrigotavares\Catalogo\Adapter;

use Rodrigotavares\Catalogo\domain\Produto;
use Rodrigotavares\Catalogo\port\ProdutoRepository;
use Rodrigotavares\Catalogo\domain\VO\SKU;
use Rodrigotavares\Catalogo\domain\VO\Dinheiro;
use Rodrigotavares\Catalogo\domain\exception\ProdutoNaoEncontradoException;

class ProdutoRepositoryJson implements ProdutoRepository
{
    protected $JsonFilePath;
    private $json;

    public function __construct()
    {
        $this->JsonFilePath = __DIR__."/../../produtos.json";

        if(empty(file_get_contents($this->JsonFilePath))):
            throw new \Exception("Json File Vazio ou Inexistente");
        endif;

        $this->json = json_decode( file_get_contents($this->JsonFilePath) );
    }

    public function buscar(SKU $sku):Produto
    {
        foreach($this->json as $item):
            if($item->SKU === $sku->getSKU()):
                return new Produto($sku,new Dinheiro($item->centavos));
            endif;
        endforeach;

        throw new ProdutoNaoEncontradoException ("Produto Não Localizado no Catálogo");
    }

    public function salvar(Produto $produto):void
    {
        $localizou = false;
        foreach($this->json as $item):
            if($item->SKU === $produto->getSKU()->getSKU()):
                $localizou = true;
                $item->centavos = $produto->getValor()->getCents();
            endif;
        endforeach;

        if($localizou === false):
            throw new ProdutoNaoEncontradoException ("Não localizou o produto no catálogo para que seja alterado o preço");
        endif;

        file_put_contents($this->JsonFilePath, json_encode($this->json) );
    }

    public function imprimirCatalogo():void
    {
        var_dump( $this->json );
    }
   
}