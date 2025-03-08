<?php

require_once __DIR__ . '/../connection/connection.php';

$seedFiles = glob(__DIR__ . '/seeds/*.php');

foreach ($seedFiles as $file) {
    require_once $file;
}

// echo "All seeds executed successfully.";
