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

if($argc<2 || $argc>3){
    $fich =basename(__FILE__);
    echo <<< MARCA_FIN
    Usage: $fich <ResultId>
MARCA_FIN;
    exit(0);
}

$resultId = (int)$argv[1];

$resultRepository=$entityManager->getRepository(Result::class);
$result=$resultRepository->findOneBy(['id'=>$resultId]);

if (null===$result){
    echo "Result $resultId not found" .PHP_EOL;
    exit(0);
}

if(in_array('--json',$argv,true)){
    echo json_encode($result, JSON_PRETTY_PRINT);
    echo PHP_EOL;
}else{
    echo sprintf('%3s - %5s - %5s - %22s' .PHP_EOL,
        'Id','User','Result','DateTime').PHP_EOL;
    /** @var Result $result */
    echo sprintf('%3s - %5s - %5s - %22s',
    $result->getId(),
    $result->getUser(),
    $result->getResult(),
    $result->getTime()
    ),
    PHP_EOL;
}