<?php

use DI\ContainerBuilder;

require __DIR__ . "/../vendor/autoload.php";

$containerBuilder = new ContainerBuilder;
//$containerBuilder->addDefinitions(require __DIR__ . "/config.php");

try {
    return $containerBuilder->build();
} catch (Exception $exc) {
    echo $exc->getMessage();
}