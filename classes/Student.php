<?php
require_once 'User.php';

class Student extends User {
    private $quizScores = [];

    public function addScore($score) {
        $this->quizScores[] = $score;
    }

    // Polymorphism: overrides parent method
    public function getGreeting() {
        return "Hello " . htmlspecialchars($this->username);
    }

    // New method to get User greeting
    public function getParentGreeting() {
        return parent::getGreeting();
    }

    public function getAverageScore() {
        if (count($this->quizScores) === 0) return 0;
        return array_sum($this->quizScores) / count($this->quizScores);
    }
}
?>