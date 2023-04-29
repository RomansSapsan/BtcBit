<?php

declare(strict_types=1);

class BtcBitTest
{
    private array $values;
    private float $minVal;
    private float $maxVal;
    private float $range;
    private const WIDTH = 80;

    public function __construct(array $values) {
        $this->values = $values;
        $this->maxVal = max($this->values);
        $this->minVal = min($this->values);
        $this->range = $this->maxVal - $this->minVal;
    }

    private function getPercentWidth(float $value, float $min, float $range): int {
        $retVal = self::WIDTH * ( ($value - $min) / $range ) + 1;
        return (int)round($retVal, 0);
    }

    private function getLine(int $width, float $curVal): string {
        $printVal = '';
        if($curVal == $this->maxVal || $curVal == $this->minVal) {
            $printVal = $curVal;
        }
        return str_repeat('*', $width) . ' ' . $printVal . PHP_EOL;
    }

    public function drawGraph(): void {
        foreach ($this->values as $value) {
            $percentWidth = $this->getPercentWidth($value, $this->minVal, $this->range);
            echo $this->getLine($percentWidth, $value);
        }
    }
}


$values = [1.1066, 1.1048, 1.1023, 1.1003, 1.0969, 1.0951, 1.0901, 1.0914, 1.0867, 1.0842, 1.0835, 1.0816, 1.08,
    1.079, 1.0801, 1.0818, 1.084, 1.0875, 1.0964, 1.0977, 1.1122, 1.1117, 1.1125, 1.1187, 1.1336, 1.1456,
    1.139, 1.1336, 1.124, 1.1104, 1.1157, 1.0982, 1.0934, 1.0801, 1.0707, 1.0783, 1.0843, 1.0827, 1.0981,
    1.0977, 1.1034, 1.0956, 1.0936, 1.0906, 1.0785, 1.0791, 1.0885, 1.0871, 1.0867, 1.0963];

$graphObject = new BtcBitTest($values);
$graphObject->drawGraph();
