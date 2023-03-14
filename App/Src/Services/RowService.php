<?php

namespace Src\Services;

use Src\Checkers\AbstractChecker;
use Src\Checkers\IntChecker;
use Src\Checkers\NotEmptyChecker;
use Src\Models\Row;

class RowService implements ServiceInterface
{
    private const RESULT_OK = 'Ok';

    private ?int $result = null;

    public function __construct(private Row $row)
    {}

    public function process(): void
    {
        $arr = $this->rowToArray($this->row);
        $max = $arr[0];
        $curr_max = $arr[0];

        for ($i = 1; $i < count($arr); $i++) {
            $curr_max = max($arr[$i], $curr_max + $arr[$i]);
            $max = max($curr_max, $max);
        }

        $this->result = $max;
    }

    public function validate(): bool
    {
        $array = $this->rowToArray($this->row);

        $checkers = [
            new NotEmptyChecker($this->row->getRow()),
            new IntChecker($array),
        ];

        /** @var AbstractChecker $checker */
        foreach ($checkers as $checker) {
            if (!$checker->check()) {
                throw new \Exception($checker->getError());
            }
        }

        return true;
    }

    private function rowToArray(Row $row): array
    {
        return explode($row->getSeparator(), $row->getRow());
    }

    public function getResult(): string
    {
        $answer = [
            'result' => self::RESULT_OK,
            'sum' => $this->result,
        ];

        return json_encode($answer, JSON_UNESCAPED_UNICODE);
    }
}
