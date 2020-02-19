<?php

use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{
    // ./vendor/bin/phpunit --bootstrap vendor/autoload.php --colors --testdox tests
    // composer dump-autoload

    /** @test **/
    public function testCanBeCreatedWithDatabasehandler(): void {
        $dbInstance = DbConnection::getInstance();
        $dbh = $dbInstance->getConnection();

        $this->assertInstanceOf(
            User::class,
            new User($dbh)
        );
    }

    /** @test **/
    public function testHasFields(): void {
        $dbInstance = DbConnection::getInstance();
        $dbh = $dbInstance->getConnection();

        $user = new User($dbh);

        $id = 0;
        $result = $user->getUser($id);

        $this->assertArrayHasKey('id', $result, 'failed to find key in result');

        /* Skapa test som kontrollerar all fält från user databasen */

    }

    /** @test **/
    public function testCanGetOne(): void {
        $dbInstance = DbConnection::getInstance();
        $dbh = $dbInstance->getConnection();

        $user = new User($dbh);

        $id = 0;
        $result = $user->getUser($id);
        $this->assertEquals($id, $result['id'], 'failed to fetch tweet with id ' . $id);

    }

    /** @test **/
    public function testCanGetAll(): void {
        /* skriv test för att hämta alla användare och kontrollera detta */
    }
}