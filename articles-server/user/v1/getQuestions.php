<?php 
require '../../connection/connection.php';  
require '../../models/Question.php';
require_once  '../../models/QuestionSkeleton.php';


if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // $user = new User($conn); 
    $questions = new Question($conn);

    $questionsList = $questions->getQuestions();

    if (empty($questionsList)) {
        http_response_code(404);
        echo json_encode(["message" => "No questions found"]);
        exit();
    }

    $questionsArray = array_map(function ($question) {
        return $question->toArray();  
    }, $questionsList);

    http_response_code(200);
    echo json_encode([
        'message' => 'Questions retrieved successfully',
        'questions' => $questionsArray
    ]);
} else {
    http_response_code(405);
    echo json_encode(["message" => "Invalid request method"]);
}
?>