<?php 
require '../../connection/connection.php';  
require '../../models/User.php';
require_once  '../../models/UserSkeleton.php';


if($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(["message" => "Invalid Request Method"]);
} else {
    if(empty($_POST['email']) || empty($_POST['password'])) {
        http_response_code(400);
        echo json_encode(["message" => "Please fill all the required fields"]);
        exit();
    }

    $email = $_POST['email'];
    $password = $_POST['password'];

    $hashed_password = hash('sha256', $password);

    $user = new User($conn);
    $userLogin = $user->getUser($email);

    if(!$userLogin) {
        http_response_code(401);
        echo json_encode(["message" => "Invalid email"]);
        exit();
    } 
    if($hashed_password !== $userLogin->getPassword()) {
        http_response_code(401);
        echo json_encode(["message" => "Invalid password"]);
        exit();
    } 

    http_response_code(200);
    echo json_encode([
        'message' => 'Login successful',
        'user' => [
            'id' => $userLogin->getUserId(),
            'email' => $userLogin->getEmail(),
            'first_name' => $userLogin->getFirstName(),
            'last_name' => $userLogin->getLastName(),
        ]
    ]);
}


?>