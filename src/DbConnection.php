<?php
// https://sv.wikipedia.org/wiki/Singleton_(designm%C3%B6nster)
class DbConnection {
    // privat variabel för instansen av klassen
    private static $instance = null;
    private $dbh;

    // konstruktorn är privat för att vi inte ska kunna skapa nya instanser med new
    // utan istället så anv. vi getInstance metoden
    private function __construct()
    {
        include './include/dbinfo.php'; // not great

        try {
            $this->dbh = new PDO(
                'mysql:host=' . $host . ';
                charset=utf8mb4;
                dbname=' . $database . '',
                $user,
                $password
            );
        } catch (PDOException $e) {
            // debug level på detta, inte lämpligt i produktion
            print "Error!: " . $e->getMessage() . "<br/>";
            die();
        }
    }

    // kollar om vi redan har en aktiv instance av klassen
    // om inte så körs konstruktorn och en instance sparas i $instance
    public static function getInstance()
    {
        if (self::$instance == null)
        {
            self::$instance = new DbConnection();
        }

        return self::$instance;
    }

    // för att hämta pdo objektet så att vi kan använda det
    public function getConnection()
    {
        return $this->dbh;
    }
}

?>