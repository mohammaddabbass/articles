<?php 

require '../../connection/connection.php';  
require '../../models/Question.php';
require_once  '../../models/QuestionSkeleton.php';

if($_SERVER['REQUEST_METHOD'] !== "POST") {
    http_response_code(405);
    echo json_encode(["message" => "Invalid request method"]);
    exit();
} 

if(empty($_POST['question_text']) || empty($_POST['answer'])) {
    http_response_code(401);
    echo json_encode(["message" => "fill all the required fields"]);
    exit();
}

$question_text = $_POST['question_text'];
$answer = $_POST['answer'];
$user_id = $_POST['user_id'];

$questionSkeleton  = new QuestionSkeleton(null, $question_text, $answer, $user_id);
$question = new Question($conn);

if($question->insertQuestion($questionSkeleton)) {
    http_response_code(200);
    echo json_encode(["message" => "question added successfully"]);
    exit();
}

http_response_code(400);
echo json_encode(["message" => "Failed to add the question"]);
exit();





?>