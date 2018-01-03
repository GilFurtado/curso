<?php

require 'C:\Users\gilsi\Desktop\git_projects\curso_codeExpert\api-master-online\bootstrap.php';

use Doctrine\ORM\EntityManager;

$dbParans = array(
    'driver' => 'pdo_sqlite',
    'memory' => "true",
    'path'   => 'memory'
);

return $entityManager = EntityManager::create($dbParans, $config);