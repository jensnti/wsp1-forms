<?php

use PHPUnit\Framework\TestCase;

class DbConnectionTest extends TestCase
{
    /** @test **/
    public function testCanBeCreatedFromDbConnection(): void {
        $this->assertInstanceOf(
            DbConnection::class,
            DbConnection::getInstance()
        );
    }

    /** @test **/
    public function testShouldReturnAPdoObject(): void {
        $dbInstance = DbConnection::getInstance();
        $dbh = $dbInstance->getConnection();

        $this->assertInstanceOf(
            PDO::class,
            $dbh
        );
    }
}