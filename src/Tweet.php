<?php

class Tweet {

    private $dbh;

    public function __construct($dbh)
    {
        $this->dbh = $dbh;
    }

    public function getAll(): array {
        try {
            $sth = $this->dbh->prepare(
                'SELECT tweets.*,
                users.name FROM tweets
                JOIN users
                ON tweets.user_id = users.id
                ORDER BY updated_at DESC');
            $sth->execute();
            $result = $sth->fetchAll(PDO::FETCH_ASSOC);
            return $result;    
        } catch (PDOException $e) {
            return ['error' => $e];
        }
    }

    public function getTweet($id): array {
        try {
            $sth = $this->dbh->prepare(
                'SELECT tweets.*,
                users.name FROM tweets
                JOIN users
                ON tweets.user_id = users.id
                WHERE tweets.id = :tweetId');
            $sth->bindParam(':tweetId', $id);
            $sth->execute();
            $row = $sth->fetch(PDO::FETCH_ASSOC);
            return $row;
        } catch (PDOException $e) {
            return ['error' => $e];
        }
    }

    public function postTweet($body, $userid = 0): array {
        try {
            $sth = $this->dbh->prepare(
                'INSERT INTO tweets (body, user_id, created_at, updated_at)
                VALUES (:body, :userId, now(), now())');
            $sth->bindParam(':body', $body);
            $sth->bindParam(':userId', $userid);
            $sth->execute();
            return ['id' => $this->dbh->lastInsertId()];
        } catch (PDOException $e) {
            return ['error' => $e];
        }
    }

    public function getAllFrom($id): array {
        /* Här är ditt/ert jobb att implementera den databasfunktion som
         * returnerar alla tweets från en specifik user
         * returvärdet ska vara en array med users alla poster från databasen
         */
        return ['error' => 'Not implemented'];
    }
}

?>