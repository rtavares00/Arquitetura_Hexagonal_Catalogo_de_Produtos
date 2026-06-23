<?php

namespace Rodrigotavares\Catalogo\domain\exception;

/**
 * Exceção base de domínio. Permite capturar qualquer violação de regra
 * de negócio do catálogo com um único tipo, separando-as de erros de
 * infraestrutura (\Exception genérica).
 */
abstract class DomainException extends \Exception
{
}
