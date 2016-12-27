<?php

require_once(__DIR__ . '/../vendor/autoload.php');

$dsn = 'mysql:dbname=todo;host=localhost;port=3306';
$username = 'username';
$password = 's3cr3t';
$pdo = new PDO($dsn, $username, $password);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$writer = new \Minerva\Writer\PdoWriter($pdo, 'todo');

// Insert a new record, based on an array of key/values.
$writer->insert(['title'=>'hello','description'=>'ok']);

// Upsert a record, the 'where' clause is passed as in the second parameter as an array
$writer->upsert(['title'=>'hello2','description'=>'ok2'], ['reference'=>'test1']);

// Update a record based on a "where" filter
$writer->update(['title'=>'hello3','description'=>'ok3'], ['reference'=>'test1']);

exit("Done\n");
