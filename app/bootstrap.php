<?php

require __DIR__ . '/../vendor/autoload.php';

$configurator = new Nette\Configurator;
//$configurator->setDebugMode('23.75.345.200'); // enable for your remote IP
$configurator->setTimeZone('Europe/Prague');
$configurator->enableTracy(__DIR__ . '/../log');
$configurator->setTempDirectory(__DIR__ . '/../temp');
$configurator->createRobotLoader()
    ->addDirectory(__DIR__)
    ->register();

$configurator->addConfig(__DIR__ . '/config/config.neon');
if (file_exists(__DIR__ . '/config/config.production.neon')) {
    $configurator->addConfig(__DIR__ . '/config/config.production.neon');
}
if (file_exists(__DIR__ . '/config/config.local.neon')) {
    $configurator->addConfig(__DIR__ . '/config/config.local.neon');
}
\Tracy\Debugger::$maxLength = 10000;
$container = $configurator->createContainer();

return $container;
