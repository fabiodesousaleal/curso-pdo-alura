<?php
require_once 'vendor/autoload.php';

use Alura\Pdo\Domain\Model\Student;

$databasePath = __DIR__ . '/banco.sqlite3';
$pdo = new PDO('sqlite:' . $databasePath);

$sqlDelete = "DELETE FROM students WHERE id=?";
$preparedStatement = $pdo->prepare($sqlDelete);
$preparedStatement->bindValue(1, 2, PDO::PARAM_INT);
var_dump($preparedStatement->execute());