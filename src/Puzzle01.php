<?php

namespace Shadowinek\Aoc2024;

class Puzzle01 extends AbstractPuzzle
{
    private array $leftNumbers = [];
    private array $rightNumbers = [];
    public function runPart01(): int
    {
        $this->loadData();

        sort($this->leftNumbers);
        sort($this->rightNumbers);

        $distance = 0;

        foreach ($this->leftNumbers as $i => $leftNumber) {
            $distance += abs($leftNumber - $this->rightNumbers[$i]);
        }

        return $distance;
    }

    public function runPart02(): int
    {
        $this->loadData();
        $occurrences = array_count_values($this->rightNumbers);
        $similarity = 0;

        foreach ($this->leftNumbers as $leftNumber) {
            $similarity += $leftNumber * ($occurrences[$leftNumber] ?? 0);
        }

        return $similarity;
    }

    private function loadData(): void
    {
        foreach ($this->data as $line) {
            $matches = [];
            preg_match('/(\d+)\s*(\d+)/', $line, $matches);

            $this->leftNumbers[] = (int) $matches[1];
            $this->rightNumbers[] = (int) $matches[2];
        }
    }
}
