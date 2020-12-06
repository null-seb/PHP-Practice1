<?php

/**
 * PHP version 7.4
 * src/create_user_admin.php
 *
 * @category Utils
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     http://www.etsisi.upm.es/ ETS de Ingeniería de Sistemas Informáticos
 */

use MiW\Results\Entity\User;
use MiW\Results\Utility\Utils;

require __DIR__ . '/../../vendor/autoload.php';

// Carga las variables de entorno
Utils::loadEnv(__DIR__ . '/../../');

$entityManager = Utils::getEntityManager();

if($argc!==2){
    $fich = basename(__FILE__);
    echo <<< MARCA_FIN
    Usage: $fich <UserId>
MARCA_FIN;
    exit(0);
}

$userId = (int)$argv[1];

$userRepository = $entityManager->getRepository(User::class);
$user = $userRepository->findOneBy(['id'=> $userId]);

if ($user===null){
    echo "User $userId not found" .PHP_EOL;
}else{
    $entityManager->remove($user);
    $entityManager->flush();
    echo "Result $userId Delete successfully" .PHP_EOL;
}
