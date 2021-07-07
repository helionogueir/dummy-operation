<?php

namespace Operation;

use Output\OutputProtocol;

interface OperationProtocol
{
  public function __construct(array $parameters);

  public function showResult(OutputProtocol $output): void;
}
