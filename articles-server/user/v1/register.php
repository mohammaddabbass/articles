<?php 
require '../../connection/connection.php';
include '../../models/User.php';
require_once  '../../models/UserSkeleton.php';


if($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(["message" => "Invalid Request Method"]);
    exit();
} else {
    if(empty($_POST['email']) || empty($_POST['first_name']) || empty($_POST['last_name']) || empty($_POST['password'])) {
        http_response_code(401);
        echo json_encode(["message" => "please fill all the required fields"]);
        exit();
    }

    $email = $_POST['email'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $password = $_POST['password'];

    $hashed_password = hash('sha256', $password);

    $user = new User($conn);
    $userRegiter = $user->getUser($email);

    if($userRegiter) {
        echo json_encode(["message" => "email already exists"]);
        exit();
    }

    $userSkeleton = new UserSkeleton(null, $email, $first_name, $last_name, $hashed_password, date('Y-m-d H:i:s'));

    if($user->createUser($userSkeleton)) {
        $userDetails = $user->getUser($email);

        http_response_code(201);
        echo json_encode([
        "message" => "user registerd successfully!",           
        "user" => [
            "id" => $userDetails->getUserId(),  
            "email" => $userDetails->getEmail(),
            "first_name" => $userDetails->getFirstName(),
            "last_name" => $userDetails->getLastName(),
        ]]);
    } else {
        http_response_code(500);
        echo json_encode(["message" => "Failed to register user"]);
    }

}


?>