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

$userRepository=$entityManager->getRepository(User::class);
$users=$userRepository->findAll();

if(empty($user)){
    echo "There are no users",PHP_EOL;
}else{
    foreach ($users as $user){
        $entityManager->remove($user);
        $entityManager->flush();
    }
    echo "Deleted users" .PHP_EOL;
}