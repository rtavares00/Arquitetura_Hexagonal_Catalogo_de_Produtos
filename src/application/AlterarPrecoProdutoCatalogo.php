<?php

namespace Rodrigotavares\Catalogo\application;

use Rodrigotavares\Catalogo\port\ProdutoRepository;
use Rodrigotavares\Catalogo\domain\VO\SKU;
use Rodrigotavares\Catalogo\domain\VO\Dinheiro;
//use Rodrigotavares\Catalogo\domain\Produto;

class AlterarPrecoProdutoCatalogo
{
    public function __construct(private ProdutoRepository $repository)
    {

    }

    public function executar($sku ,$novoValorEmCentavos):void
    {
        $produto = $this->repository->buscar( new SKU($sku) );
        $produto->alterarPreco( new Dinheiro($novoValorEmCentavos) );
        $this->repository->salvar($produto);
        echo "Método executar Acionado com Sucesso \n";
        echo "DUMP DO CATÁLOGO: \n\n";
        $this->repository->imprimirCatalogo();
    }
}