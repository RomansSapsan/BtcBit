<?php
declare(strict_types=1);

/*
 * Made on PHP v8.1.2
 */
class BtcBitTest {

    private const HEIGHT = 25;

    private array $values;
    private float $minVal;
    private float $maxVal;
    private float $range;

    public function __construct(array $values) {
        $this->values = $values;
        $this->minVal = min($this->values);
        $this->maxVal = max($this->values);
        $this->range = self::HEIGHT / ($this->maxVal - $this->minVal);
    }

    public function drawGraph(): void {
        for ($y = self::HEIGHT; $y >= 0; $y--) {
            $value = $this->getValue($y);
            $line = $this->getLine($value);
            echo $line . PHP_EOL;
        }
    }

    private function getValue(int $y): float {
        return $this->minVal + ($y / $this->range);
    }

    private function getLine(float $value): string {
        $line = '';
        if(!empty($this->values)) {
            foreach ($this->values as $currentVal) {
                if ($currentVal >= $value) {
                    $line .= '*';  // zakrashivaem kolonku
                } else {
                    $line .= ' ';
                }
            }
        }
        return $line;
    }
}


$values = [
    1.1066, 1.1048, 1.1023, 1.1003, 1.0969, 1.0951, 1.0901, 1.0914, 1.0867, 1.0842, 1.0835, 1.0816, 1.08,
    1.079, 1.0801, 1.0818, 1.084, 1.0875, 1.0964, 1.0977, 1.1122, 1.1117, 1.1125, 1.1187, 1.1336, 1.1456,
    1.139, 1.1336, 1.124, 1.1104, 1.1157, 1.0982, 1.0934, 1.0801, 1.0707, 1.0783, 1.0843, 1.0827, 1.0981,
    1.0977, 1.1034, 1.0956, 1.0936, 1.0906, 1.0785, 1.0791, 1.0885, 1.0871, 1.0867, 1.0963
];

$drawer = new BtcBitTest($values);
$drawer->drawGraph();