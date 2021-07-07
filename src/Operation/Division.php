<?php

namespace Operation;

use DivisionByZeroError;
use Parse\ParseToFloat;
use Output\OutputProtocol;
use InvalidArgumentException;
use Operation\OperationProtocol;

class Division implements OperationProtocol
{
  private $var1 = 0.0;
  private $var2 = 0.0;

  public function __construct(array $parameters)
  {
    if (count($parameters) < 2) throw new InvalidArgumentException("Bad Request");

    list($var1, $var2) = (new ParseToFloat())->parseArray($parameters);
    $this->var1 = $var1;
    $this->var2 = $var2;
  }

  public function showResult(OutputProtocol $output): void
  {
    try {
      $output->display(sprintf(
        '%d ÷ %d = %d',
        $this->var1,
        $this->var2,
        ($this->var1 / $this->var2)
      ));
    } catch (DivisionByZeroError $e) {
      $output->display($e->getMessage());
    }
  }
}
