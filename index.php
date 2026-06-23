<?php
require_once __DIR__ . '/vendor/autoload.php';

use Rodrigotavares\Catalogo\application\AlterarPrecoProdutoCatalogo;
use Rodrigotavares\Catalogo\Adapter\ProdutoRepositoryJson;
use Rodrigotavares\Catalogo\port\ProdutoRepository;
use Rodrigotavares\Catalogo\domain\VO\SKU;
use Rodrigotavares\Catalogo\domain\VO\Dinheiro;

$catalogo = new ProdutoRepositoryJson();
$casoDeUso = new AlterarPrecoProdutoCatalogo($catalogo);
$casoDeUso->executar("ABC-1234",2500);