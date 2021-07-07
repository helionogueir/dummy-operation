<?php

namespace Output\CommandLine;

use Output\OutputProtocol;

class StandardOutput implements OutputProtocol
{
  public function display(string $text): void
  {
    echo $text . PHP_EOL;
  }
}
