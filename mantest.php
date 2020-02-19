<?php

/* Ibland kan det vara bra att kunna testa saker manuellt för 
 * att vara säker på hur ens data ser ut osv.
 * Kör detta med php mantest.php
 */

include './src/DbConnection.php';
include './src/Tweet.php';
include './src/User.php';

$dbInstance = DbConnection::getInstance();
$dbh = $dbInstance->getConnection();

$tweet = new Tweet($dbh);

$result = $tweet->getAll();

var_dump($result);