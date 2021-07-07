<?php

namespace Operation;

use Output\OutputProtocol;
use InvalidArgumentException;
use Operation\OperationProtocol;

class Prime implements OperationProtocol
{
  private $value = 0;

  public function __construct(array $parameters)
  {
    if (!count($parameters) || !boolval($parameters[0]))
      throw new InvalidArgumentException("Bad Request");

    $this->value = ceil($parameters[0]);
    if ($this->value > 1000)
      throw new InvalidArgumentException("{$this->value} is too long");
  }

  public function showResult(OutputProtocol $output): void
  {
    $current = 2;
    $limit = $this->value;
    do {
      if ($this->isPrime($current)) {
        $output->display("{$current}");
        $limit--;
      }
      $current++;
    } while (boolval($limit));
  }

  private function isPrime($number): bool
  {
    for ($i = 2; $i < $number; $i++)
      if ($number % $i == 0) return false;
    return true;
  }
}
