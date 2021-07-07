<?php

namespace Parse;

class ParseToFloat
{
  public function parseArray(array $values): array
  {
    return array_map(function (string $value): float {
      return floatval($value);
    }, $values);
  }
}
