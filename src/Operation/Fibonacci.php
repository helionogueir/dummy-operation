<?php

namespace Operation;

use Output\OutputProtocol;
use InvalidArgumentException;
use Operation\OperationProtocol;

class Fibonacci implements OperationProtocol
{
  private $value = 0;

  public function __construct(array $parameters)
  {
    if (!count($parameters)) throw new InvalidArgumentException("Bad Request");

    $this->value = ceil($parameters[0]);

    if ($this->value > 92)
      throw new InvalidArgumentException("{$this->value} is too long");
  }

  public function showResult(OutputProtocol $output): void
  {
    $this->generate($output, $this->value);
  }

  private function generate(
    OutputProtocol $output,
    int $limit,
    int $previous = 0,
    int $current = 0
  ): void {
    if (boolval($limit)) {
      $next = ($current === 0) ? 1 : ($previous + $current);
      $output->display($current);
      $this->generate($output, ($limit - 1), $current, $next);
    }
  }
}
