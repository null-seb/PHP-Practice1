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

if($argc<2 || $argc>6){
    $fich = basename(__FILE__);
    echo <<< MARCA_FIN
    Usage: $fich <UserId> <UserName> <Email> <Password> <IsEnabled>
MARCA_FIN;
    exit(0);
}

$userId=(int)$argv[1];
$userName=(string)$argv[2];
$email=(string)$argv[3];
$password=(string)$argv[4];
$enabled=(string)$argv[5];

echo "userId:" .$userId .PHP_EOL;

$userRepository = $entityManager->getRepository(User::class);
$user = $userRepository->findOneBy(['id'=> $userId]);

if($user === null){
    echo "User $userId not found" .PHP_EOL;
    exit(0);
}

if($userName!==''){
    $user->setUsername($userName);
}

if($email!==''){
    $user->setEmail($email);
}

if($password!==''){
    $user->setPassword($password);
}

if($enabled==='true'|| $enabled==='false'){
    $enabled= $enabled==='true';
    $user->setEnabled($enabled);
}

try{
    $entityManager->persist($user);
    $entityManager->flush();
    echo 'Updated User with ID #' . $user->getId() . PHP_EOL;
}catch(Exception $exception){
    echo $exception->getMessage() .PHP_EOL;
}


