<?php

namespace Shadowinek\Aoc2024;

class AoC
{
    private function readInput(int $puzzle, bool $real_input): array
    {
        return file(
            sprintf(
                __DIR__ . '/../input%s/input_%s',
                $real_input ? '' : '_test',
                $this->getNumberString($puzzle),
            ),FILE_IGNORE_NEW_LINES);
    }

    private function getNumberString(string $number): string
    {
        return sprintf('%02d', $number);
    }

    public function execute(int $puzzle, int $part, bool $real_input): void
    {
        $data = $this->readInput($puzzle, $real_input);
        $expected = include_once(__DIR__ . '/../output/expected.php');

        $class = 'Shadowinek\\Aoc2024\\Puzzle' . $this->getNumberString($puzzle);
        $method = 'runPart' . $this->getNumberString($part);

        echo 'Puzzle:   ' . $this->getNumberString($puzzle) . PHP_EOL;
        echo 'Part:     ' . $this->getNumberString($part) . PHP_EOL;
        echo 'Dataset:  ' . ($real_input ? 'real' : 'test') . PHP_EOL;
        echo '===============' . PHP_EOL;
        echo 'Output:   ' . (class_exists($class) ? (new $class($data))->$method() : 'This puzzle is not defined yet!') . PHP_EOL;
        echo 'Expected: ' . ($expected[$puzzle][$part][$real_input] ?? '-') . PHP_EOL;
    }
}
