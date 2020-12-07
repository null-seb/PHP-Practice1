<?php

/**
 * PHP version 7.4
 * src/create_user_admin.php
 *
 * @category Utils
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     http://www.etsisi.upm.es/ ETS de Ingeniería de Sistemas Informáticos
 */

use MiW\Results\Entity\Result;
use MiW\Results\Utility\Utils;

require __DIR__ . '/../../vendor/autoload.php';

// Carga las variables de entorno
Utils::loadEnv(__DIR__ . '/../../');

$entityManager = Utils::getEntityManager();

if($argc!==4){
    $fich = basename(__FILE__);
    echo <<< MARCA_FIN
    Usage: $fich <ResultId><UserId><Result>
MARCA_FIN;

}

$resultId=(int)$argv[1];
$userId=(int)$argv[2];
$resultValue=(int)$argv[3];
$newTimestamp=$argv[4]?? new DateTime('now');

$resultRepository=$entityManager->getRepository(Result::class);
$result=$resultRepository->findOneBy(['id'=>$resultId]);

if ($result===null){
    echo "Result $resultId not found" .PHP_EOL;
    exit(0);
}

$userRepository = $entityManager->getRepository(User::class);
$user = $userRepository->findOneBy(['id'=> $userId]);

if($user===null){
    echo "User $userId not found" .PHP_EOL;
    exit(0);
}

if($userId>0){
    $result->setUser($user);
}

if($resultValue>0){
    $result->setResult($resultValue);
}
$result->setTime($newTimestamp);

try {
    $entityManager->persist($result);
    $entityManager->flush();
    echo  'Updated Result with ResultIdID' .$result->getId()
        .''.$result->getUser() .'' .$result->getResult() .PHP_EOL;
}catch (Exception $exception){
    echo $exception->getMessage();
}
