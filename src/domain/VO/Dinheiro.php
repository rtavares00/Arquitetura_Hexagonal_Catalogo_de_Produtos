<?php

namespace Rodrigotavares\Catalogo\domain\VO;

use Rodrigotavares\Catalogo\domain\exception\DinheiroInvalidoException;

final class Dinheiro
{
    public function __construct(private int $centavos)
    {
        if($centavos < 0):
            throw new DinheiroInvalidoException("Dinheiro nao pode ter valor negativo");
        endif;
    }

    public function isGreaterThan(Dinheiro $other) : bool
    {
        return $this->centavos > $other->centavos;
    }

    public function ehMaiorOuIgualA(Dinheiro $other): bool
    {
        return $this->centavos >= $other->centavos;
    }

    public function multiplicarPor(int $fator): Dinheiro
    {
        return new Dinheiro($this->centavos * $fator);
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