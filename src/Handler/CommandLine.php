<?php

namespace Handler;

use Exception;
use LogicException;
use Operation\Invalid;
use Output\OutputProtocol;
use Handler\HandlerProtocol;
use InvalidArgumentException;
use Operation\OperationProtocol;
use Output\CommandLine\StandardOutput;

class CommandLine implements HandlerProtocol
{

  const SHORT_OPTIONS = 'o:n:O:';
  const LONG_OPTIONS = ['operation:', 'number:', 'output:'];

  public function execute(): void
  {
    $operation = $this->getOperation();
    $operation->showResult($this->getOutput());
  }

  private function getOperation(): OperationProtocol
  {
    try {
      $options = getopt(self::SHORT_OPTIONS, self::LONG_OPTIONS);
      $operation = $options['operation'] ?? $options['o'] ?? '';
      $classname = "\\Operation\\{$operation}";
      $object = new $classname($this->getValues());
    } catch (InvalidArgumentException $e) {
      $object = new Invalid([$e->getMessage()]);
    } catch (LogicException $e) {
      $object = new Invalid(["Unexpected Operation"]);
    }

    return $object;
  }

  private function getValues(): array
  {
    $options = getopt(self::SHORT_OPTIONS, self::LONG_OPTIONS);
    $values = $options['number'] ?? $options['n'] ?? '';
    return is_array($values) ? $values : [$values];
  }

  private function getOutput(): OutputProtocol
  {
    try {
      $options = getopt(self::SHORT_OPTIONS, self::LONG_OPTIONS);
      $operation = $options['output'] ?? $options['O'] ?? '';
      $classname = "\\Output\\{$operation}";
      $object = new $classname();
    } catch (LogicException $e) {
      $object = new StandardOutput();
    }

    return $object;
  }
}
