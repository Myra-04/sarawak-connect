<?php
class User {
    protected $username;

    public function __construct($username) {
        $this->username = $username;
    }

    public function getGreeting() {
        return "Welcome, " . htmlspecialchars($this->username);
    }

    public function getUsername() {
        return $this->username;
    }
}
?>