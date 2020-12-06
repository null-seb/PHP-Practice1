<?php

use MiW\Results\Entity\User;
use MiW\Results\Utils;

require __DIR__ . '/../../vendor/autoload.php';

// Carga las variables de entorno
Utils::loadEnv(__DIR__ . '/../../');

$entityManager = Utils::getEntityManager();

if($argc<2 || $argc>3) {
    $fich = basename(__FILE__);
    echo <<< MARCA_FIN
    Usage: $fich <UserId>
MARCA_FIN;
exit(0);
}

$userId = (int)$argv[1];

$userRepository = $entityManager->getRepository(User::class);
$user= $userRepository->findOneBy(['id' => $userId]);

if (null===$user){
    echo "User $userId not found" .PHP_EOL;
    exit(0);
}

if (in_array('--json', $argv, true)){
    echo json_encode($user,JSON_PRETTY_PRINT);
    echo PHP_EOL;
}else{
    echo PHP_EOL .sprintf(
        '%2s: %20s %30s %7s %7s' .PHP_EOL,
        'Id', 'Username:', 'Email:', 'Enabled:', 'Is Admin?'
        );
    /** @var User $user */
    echo sprintf(
        '%2s: %20s %30s %7s %7s',
        $user->getId(),
        $user->getUsername(),
        $user->getEmail(),
        ($user->isEnabled())?'true':'false',
        ($user->isAdmin())?'true':'false'
    ),
    PHP_EOL;
}