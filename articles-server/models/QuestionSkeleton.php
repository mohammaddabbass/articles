<?php 

class QuestionSkeleton {
    private $question_id;
    private $question_text;
    private $answer;
    private $user_id;

    public function __construct($question_id, $question_text, $answer, $user_id)
    {
        $this->question_id = $question_id;
        $this->question_text = $question_text;
        $this->answer = $answer;
        $this->user_id = $user_id;
    }

    

    public function getQuestion_id() {
        return $this->question_id;
    }


    public function getQuestion_text() {
        return $this->question_text;
    }


    public function getAnswer() {
        return $this->answer;
    }


    public function getUser_id() {
        return $this->user_id;
    }


    public function toArray() {
        return[
            'question_id' => $this->question_id,
            'question_text' => $this->question_text,
            'answer' => $this->answer,
            'user_id' => $this->user_id,
        ];
    }

}


?>