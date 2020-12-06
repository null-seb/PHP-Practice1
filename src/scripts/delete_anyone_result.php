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

if($argc!==2){
    $fich = basename(__FILE__);
    echo <<< MARCA_FIN
    Usage: $fich <ResultId>
MARCA_FIN;
    exit(0);
}

$resultId =(int)$argv[1];

$userRepository = $entityManager->getRepository(Result::class);
$result = $userRepository->findOneBy(['id'=> $resultId]);

if($result===null){
    echo "Result $resultId not found" . PHP_EOL;
}else{
    $entityManager->remove($result);
    $entityManager->flush();
    echo "Result $resultId Delete successfully" .PHP_EOL;
}