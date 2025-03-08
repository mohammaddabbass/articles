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




?>