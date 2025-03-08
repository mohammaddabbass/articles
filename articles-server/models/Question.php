<?php

require_once __DIR__ . '/QuestionSkeleton.php';

class Question {
    private $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function insertQuestion(QuestionSkeleton $questionSkeleton) {
        $query = 'INSERT INTO questions (user_id, question_text, answer) VALUES (?, ?, ?)';

        if($stmt = $this->conn->prepare($query)) {
            $user_id = $questionSkeleton->getUser_id();
            $question_text = $questionSkeleton->getQuestion_text();
            $answer = $questionSkeleton->getAnswer();

            $stmt->bind_param(
                'iss',
                $user_id,
                $question_text,
                $answer,
            );

            if($stmt->execute()) {
                $stmt->close();
                return true;
            } else {
                $stmt->close();
                return false;
            }
        }
        return false;
    }


    public function getQuestions() {
        $query = 'SELECT * FROM questions';
        $questions = [];

        if($stmt = $this->conn->prepare($query)) {
            $stmt->execute();
            $result = $stmt->get_result();

            while($row = $result->fetch_assoc()){
                $questionSkeleton = new QuestionSkeleton(
                    $row['question_id'],
                    $row['question_text'],
                    $row['answer'],
                    $row['user_id']
                );
                $questions[] = $questionSkeleton;
            }

            $stmt->close();
            return $questions;
        }
        return $questions;
    }

}


?>