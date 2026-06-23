<?php

namespace Rodrigotavares\Catalogo\domain\VO;

use Rodrigotavares\Catalogo\domain\exception\DinheiroInvalidoException;

final class Dinheiro
{
    public function __construct(private int $centavos)
    {
        if($centavos === 0):
            throw new DinheiroInvalidoException("Dinheiro Não pode ter valor 0");
        endif;

        if($centavos < 0):
            throw new DinheiroInvalidoException("Dinheiro nao pode ter valor negativo");
        endif;
    }

    public function isGreaterThan(Dinheiro $other) : bool
    {
        return $this->centavos > $other->centavos;
    }

    public function equalsTo(Dinheiro $other): bool
    {
        return $this->centavos === $other->centavos;
    }

    public function getCents():int
    {
        return $this->centavos;
    }

}