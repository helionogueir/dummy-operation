<?php

namespace Operation;

use Output\OutputProtocol;
use Operation\OperationProtocol;

class Invalid implements OperationProtocol
{
  private $message = "Unexpected error";

  public function __construct(array $parameters)
  {
    $this->message = $parameters[0] ?? $this->message;
  }

  public function showResult(OutputProtocol $output): void
  {
    $output->display($this->message);
  }
}
