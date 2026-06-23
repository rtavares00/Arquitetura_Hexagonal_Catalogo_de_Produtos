<?php

namespace Rodrigotavares\Catalogo\domain\VO;

use Rodrigotavares\Catalogo\domain\exception\SkuInvalidoException;

final class SKU{

    public function __construct(private string $sku)
    {
        if(preg_match('/^[A-Z]{3}-\d{4}$/', $sku) !== 1):
            throw new SkuInvalidoException("SKU inválido: use o formato ABC-1234 (3 letras maiúsculas + hífen + 4 dígitos)");
        endif;
    }

    public function getSKU()
    {
        return $this->sku;
    }

}
