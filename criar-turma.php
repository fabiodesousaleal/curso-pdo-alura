<?php

use Alura\Pdo\Domain\Model\Student;
use Alura\Pdo\Infrastructure\Persistence\ConnectionCreator;
use Alura\Pdo\Infrastructure\Repository\PdoStudentRepository;

require_once "vendor/autoload.php";
$connection = ConnectionCreator::createConnection();
$studentRepository = new PdoStudentRepository($connection);

/* ***** Adicionando alunos na turma***** */

$connection->beginTransaction();

try {
    $aStudent = new Student(
        null,
        'Lucas Andrade',
        new DateTimeImmutable('1985-05-01')
    );
    $studentRepository->save($aStudent);

    $anotherStudent = new Student(
        null,
        'Alberto Pereira',
        new DateTimeImmutable('1985-05-01')
    );
    $studentRepository->save($anotherStudent);

    $connection->commit();
} catch (RuntimeException $e){
    echo $e->getMessage().PHP_EOL;
    $connection->rollBack();
}




