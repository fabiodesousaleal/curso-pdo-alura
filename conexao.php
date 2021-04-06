<?php

$caminhoBanco = __DIR__ . '/banco.sqlite3';
$pdo = new PDO('sqlite:' . $caminhoBanco);

echo 'Conectado'.PHP_EOL;
$pdo->exec( 'CREATE TABLE students (id INTEGER PRIMARY KEY, name TEXT, birth_date TEXT);');