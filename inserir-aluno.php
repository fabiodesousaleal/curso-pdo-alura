<?php
require_once 'vendor/autoload.php';

use Alura\Pdo\Domain\Model\Student;

$databasePath = __DIR__ . '/banco.sqlite3';
$pdo = new PDO('sqlite:' . $databasePath);

$student = new Student(
    null,
    'Fernando Leal',
    new \DateTimeImmutable('1997-10-15')
);

$sqlInsert = "INSERT INTO students (name, birth_date) VALUES (?, ?);";
$statement = $pdo->prepare($sqlInsert);
$statement->bindValue(1, $student->name());
$statement->bindValue(2, $student->birthDate()->format('Y-m-d'));

if ($statement->execute()) {
    echo "Aluno incluído";
}