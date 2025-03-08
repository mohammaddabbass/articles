<?php 

$sql_questions = "CREATE TABLE IF NOT EXISTS questions (
    question_id INT NOT NULL AUTO_INCREMENT,
    question_text TEXT NOT NULL,
    answer TEXT NULL,
    user_id INT NOT NULL,
    PRIMARY KEY (question_id),
    FOREIGN KEY (user_id) REFERENCES users(user_id) ON DELETE CASCADE
) ENGINE=InnoDB;";

?>