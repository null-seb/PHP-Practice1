<?php

/**
 * PHP version 7.4
 * src/cli-config.php
 *
 * @category Utils
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     http://www.etsisi.upm.es/ ETS de Ingeniería de Sistemas Informáticos
 */

use Doctrine\ORM\Tools\Console\ConsoleRunner;
use MiW\Results\Utility\Utils;

// Load env variables from .env + (.docker ||.local )
Utils::loadEnv(__DIR__ . '/..');

$entityManager = Utils::getEntityManager();

return ConsoleRunner::createHelperSet($entityManager);
