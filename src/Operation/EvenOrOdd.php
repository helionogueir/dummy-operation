<?php

namespace Operation;

use Output\OutputProtocol;
use InvalidArgumentException;
use Operation\OperationProtocol;

class EvenOrOdd implements OperationProtocol
{
  private $value = 0;

  public function __construct(array $parameters)
  {
    if (!count($parameters)) throw new InvalidArgumentException("Bad Request");

    $this->value = ceil($parameters[0]);
  }

  public function showResult(OutputProtocol $output): void
  {
    $output->display(sprintf(
      '%d is %s',
      $this->value,
      ($this->value % 2 == 0 ? 'even' : 'odd'),
    ));
  }
}
