<?php

use PHPUnit\Framework\TestCase;

class TweetTest extends TestCase
{
    // ./vendor/bin/phpunit --bootstrap vendor/autoload.php --colors --testdox tests
    // composer dump-autoload

    /** @test **/
    public function testCanBeCreatedWithDatabasehandler(): void {
        $dbInstance = DbConnection::getInstance();
        $dbh = $dbInstance->getConnection();

        $this->assertInstanceOf(
            Tweet::class,
            new Tweet($dbh)
        );
    }

    /** @test **/
    public function testHasFields(): void {
        $dbInstance = DbConnection::getInstance();
        $dbh = $dbInstance->getConnection();

        $tweet = new Tweet($dbh);

        $id = 1;
        $result = $tweet->getTweet($id);

        $this->assertArrayHasKey('id', $result, 'failed to find key in result');
        $this->assertArrayHasKey('user_id', $result, 'failed to find key in result');

        /* Skapa test som kontrollerar all fält från tweet databasen */

    }

    /** @test **/
    public function testCanBeCreateadFromData(): void {
        $dbInstance = DbConnection::getInstance();
        $dbh = $dbInstance->getConnection();

        $tweet = new Tweet($dbh);

        $result = $tweet->postTweet('This is some testdata');

        $this->assertGreaterThan(0, $result, 'failed to insert data');
    }

    /** @test **/
    public function testCanGetAll(): void {
        $dbInstance = DbConnection::getInstance();
        $dbh = $dbInstance->getConnection();

        $tweet = new Tweet($dbh);

        $result = $tweet->getAll();

        //$this->assertGreaterThanOrEqual(1, count($result), 'failed to fetch data');
        $this->assertArrayHasKey('body', $result[0], 'failed to find data in result');
    }

    /** @test **/
    public function testCanGetOne(): void {
        $dbInstance = DbConnection::getInstance();
        $dbh = $dbInstance->getConnection();

        $tweet = new Tweet($dbh);

        $id = 1;
        $result = $tweet->getTweet($id);
        $this->assertEquals($id, $result['id'], 'failed to fetch tweet with id ' . $id);
    }

    /** @test **/
    public function testCanGetAllByUser(): void {
        $dbInstance = DbConnection::getInstance();
        $dbh = $dbInstance->getConnection();

        $tweet = new Tweet($dbh);

        $id = 0;
        $result = $tweet->getAllFrom($id); // Denna metod finns men är inte färdig

        $this->assertArrayHasKey('body', $result[0], 'failed to find data in result');
    }
}