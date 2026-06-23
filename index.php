<?php
require_once __DIR__ . '/vendor/autoload.php';

use Rodrigotavares\Catalogo\application\AlterarPrecoProdutoCatalogo;
use Rodrigotavares\Catalogo\Adapter\ProdutoRepositoryJson;
use Rodrigotavares\Catalogo\domain\exception\DomainException;

if ($argc < 3):
    fwrite(STDERR, "Uso: php index.php <SKU> <novoValorEmCentavos>" . PHP_EOL);
    exit(1);
endif;

$sku = $argv[1];
$novoValor = (int) $argv[2];

$catalogo = new ProdutoRepositoryJson();
$casoDeUso = new AlterarPrecoProdutoCatalogo($catalogo);

try {
    $produto = $casoDeUso->executar($sku, $novoValor);
} catch (DomainException $e) {
    fwrite(STDERR, "Erro: " . $e->getMessage() . PHP_EOL);
    exit(1);
}

echo "Preço alterado com sucesso." . PHP_EOL;
echo "  SKU:                   " . $produto->getSKU()->getSKU() . PHP_EOL;
echo "  Novo valor (centavos): " . $produto->getValor()->getCents() . PHP_EOL;