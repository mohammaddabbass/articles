<?php

require_once __DIR__ . '/../../connection/connection.php'; 


$query = "INSERT INTO users (email, first_name, last_name, created_at, password) VALUES (?, ?, ?, NOW(), ?)";

if ($stmt = $conn->prepare($query)) {
    $email = "mohammad@gmail.com";
    $first_name = "Mohammad";
    $last_name = "Abbas";
    $password = hash("sha256", "1234"); 
    $stmt->bind_param("ssss", $email, $first_name, $last_name, $password);
    $stmt->execute();
    
    $stmt->close();
    echo "User seeding completed successfully!";
} else {
    die("Seeding failed: " . $conn->error);
}

$conn->close();

?>
