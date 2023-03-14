<?php

namespace Src;

require_once 'vendor/autoload.php';

use Src\Models\Row;
use Src\Services\RowService;

unset($argv[0]);

$row = new Row(implode(' ', $argv));

$service = new RowService($row);
try {
    $service->validate();

    $service->process();

    echo 'Max result: ' .  $service->getResult() . "\n";

} catch (\Exception $e) {
    $answer = [
        'result' => $e->getMessage(),
        'sum' => null
    ];

    echo json_encode($answer, JSON_UNESCAPED_UNICODE) . "\n";
}



