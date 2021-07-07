<?php

namespace Output;

interface OutputProtocol
{
  public function display(string $text): void;
}
