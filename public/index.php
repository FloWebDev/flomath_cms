<?php

use App\Application;

require __DIR__ . '/../autoload.php';
require __DIR__ . '/../core/functions.php';
if (file_exists(__DIR__ . '/../config.php')) {
    require __DIR__ . '/../config.php';
} else {
    require __DIR__ . '/../config-sample.php';
}

$app = new Application();
$app->run();
