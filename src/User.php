<?php

class User {

    private $dbh;

    public function __construct($dbh)
    {
        $this->dbh = $dbh;
    }

    public function getUser($id): array {
        try {
            /* Skapa kod för att hämta en användare med ID från databasen */
            $result = [];

            return $result;
        } catch (PDOException $e) {
            return ['error' => $e];
        }
    }

    public function getAll() {
        
    }
}