<?php

require_once __DIR__ . '/UserSkeleton.php';

class User {
    private $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function createUser(UserSkeleton $userSkeleton) {
        $query = 'INSERT INTO users (email, first_name, last_name, password, created_at) VALUES (?, ?, ?, ?, ?)';

        if($stmt = $this->conn->prepare($query)) {
            $email = $userSkeleton->getEmail();
            $first_name = $userSkeleton->getFirstName();
            $last_name = $userSkeleton->getLastName();
            $password = $userSkeleton->getPassword();
            $created_at = $userSkeleton->getCreatedAt();

            $stmt->bind_param(
                'sssss',
                $email,
                $first_name,
                $last_name,
                $password,
                $created_at

            );

            if($stmt->execute()){
                $stmt->close();
                return true;
            } else {
                $stmt->close();
                return false;
            }

        }
        return false;
    }

    public function getUser($email) {
        $query = 'SELECT * FROM users WHERE email = ?';

        if($stmt = $this->conn->prepare($query)) {
            $stmt->bind_param('s', $email);

            $stmt->execute();
            $result = $stmt->get_result();

            if($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $userSkeleton = new UserSkeleton(
                    $row['user_id'],
                    $row['email'],
                    $row['first_name'],
                    $row['last_name'],
                    $row['password'],
                    $row['created_at'],
                );
                $stmt->close();
                return $userSkeleton;
            }
        }
        return null;
    }
}

?>