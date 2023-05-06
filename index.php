<?php
// Just index

$config = require 'config.php';

spl_autoload_register(function ($className) {
    $classFile = $className . '.php';
    if (file_exists($classFile)) {
        require_once $classFile;
    }
});

print('INDEX' . '<br>');

$consoleMinLevel = $config['log']['console']['min_level'];
$fileMinLevel = $config['log']['file']['min_level'];

$consoleTarget = new ConsoleLogTarget;

$consoleTarget->setMinLogLevel($consoleMinLevel);

$logger = new Logger;

$logger->debug('This is a debug message<br>');
$logger->info('This is an info message<br>');
$logger->warning('This is a warning message<br>');
$logger->error('This is an error message<br>');
