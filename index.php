<?php
require_once __DIR__ . '/vendor/autoload.php';

use Rodrigotavares\Catalogo\application\AlterarPrecoProdutoCatalogo;
use Rodrigotavares\Catalogo\Adapter\ProdutoRepositoryJson;
use Rodrigotavares\Catalogo\port\ProdutoRepository;
use Rodrigotavares\Catalogo\domain\VO\SKU;
use Rodrigotavares\Catalogo\domain\VO\Dinheiro;

if ($argc < 3):
    fwrite(STDERR, "Uso: php index.php <SKU> <novoValorEmCentavos>" . PHP_EOL);
    exit(1);
endif;

$sku = $argv[1];
$novoValor = (int) $argv[2];

$catalogo = new ProdutoRepositoryJson();
$casoDeUso = new AlterarPrecoProdutoCatalogo($catalogo);
$casoDeUso->executar($sku, $novoValor);