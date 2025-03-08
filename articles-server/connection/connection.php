<?php

$server = "localhost";
$username = "root";
$password= "";
$db_name = "articles";


try {
    $conn = mysqli_connect($server, $username, $password, $db_name);
} catch (\Throwable $th) {
    echo "Connection failed";
    die();
}



$checkUsersTable = $conn->query("SHOW TABLES LIKE 'users'");
$checkQuestionsTable = $conn->query("SHOW TABLES LIKE 'questions'");

if ($checkUsersTable->num_rows == 0 || $checkQuestionsTable->num_rows == 0) {
    require_once __DIR__ . '/../database/migrate.php';
}

$checkSeed = $conn->query("SELECT COUNT(*) as total FROM questions");
$row = $checkSeed->fetch_assoc();   
if ($row['total'] == 0) {
    require_once __DIR__ . '/../database/seed.php';
}
?>



