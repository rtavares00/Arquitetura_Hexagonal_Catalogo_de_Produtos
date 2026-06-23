<?php

namespace Rodrigotavares\Catalogo\domain\VO;

final class Dinheiro
{
    public function __construct(private int $centavos)
    {
        if($centavos === 0):
            throw new \Exception("Dinheiro Não pode ter valor 0");
        endif;

        if($centavos < 0):
            throw new \Exception("Dinheiro nao pode ter valor negativo");
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