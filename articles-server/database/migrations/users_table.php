<?php 
require '../../connection/connection.php';

$sql_users= "CREATE TABLE IF NOT EXISTS users (
    user_id INT NOT NULL AUTO_INCREMENT,
    email VARCHAR(50) NULL,
    first_name VARCHAR(30) NULL,
    last_name VARCHAR(30) NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (user_id)
) ENGINE=InnoDB;";

if (!$conn->query($sql_users)) {
    die("Migration failed: " . $conn->error);
}

?>