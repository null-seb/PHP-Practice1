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

$resultsRepository=$entityManager->getRepository(Result::class);
$results= $resultsRepository->findAll();

if(empty($results)){
    echo "There are no results" .PHP_EOL;
}else{
    foreach($results as $result){
        $entityManager->remove($result);
        $entityManager->flush();
    }
    echo "Results eliminated" .PHP_EOLl;
}