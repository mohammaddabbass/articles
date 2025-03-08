<?php

require_once __DIR__ . '/../connection/connection.php';

$migrationFiles = glob(__DIR__ . '/migrations/*.php');

foreach ($migrationFiles as $file) {
    require_once $file;
}

echo "All migrations executed successfully.";