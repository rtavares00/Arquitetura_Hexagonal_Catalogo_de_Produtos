<?php
namespace Rodrigotavares\Catalogo\port;

use Rodrigotavares\Catalogo\domain\Produto;
use Rodrigotavares\Catalogo\domain\VO\SKU;

interface ProdutoRepository{
    public function salvar(Produto $produto):void;
    public function buscar(SKU $sku):Produto;
}