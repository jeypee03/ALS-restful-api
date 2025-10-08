<?php

require __DIR__ . '/../vendor/autoload.php';

// Attempt to instantiate model and print its table name
try {
    $m = new App\Models\Recommendations();
    echo $m->getTable() . PHP_EOL;
} catch (Throwable $e) {
    echo 'Error: ' . $e->getMessage() . PHP_EOL;
}
