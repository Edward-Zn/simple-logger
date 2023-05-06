<?php

/*
 * For testing purposes of console command 'php log.php'
 * Configurations are in file config.php
 * To set minimum logging level change "min_level" in config.php for each target with predefined constants of LogLevel.php
 */

$config = require 'config.php';

spl_autoload_register(function ($className) {
    $classFile = $className . '.php';
    if (file_exists($classFile)) {
        require_once $classFile;
    }
});

$consoleMinLevel = $config['log']['console']['min_level'];

$fileMinLevel = $config['log']['file']['min_level'];
$filePath = $config['log']['file']['file_path'];

$emailMinLevel = $config['log']['email']['min_level'];
$loggingMail = $config['log']['email']['mail'];

// Log targets setting with the obtained minimum log levels
$consoleLogger = new ConsoleLogTarget;
$fileLogger = new FileLogTarget($filePath);
$emailLogger = new EmailLogTarget($loggingMail, 'server@mail.com', LogLevel::ERROR);

$consoleLogger->setMinLogLevel($consoleMinLevel);
$fileLogger->setMinLogLevel($fileMinLevel);
$emailLogger->setMinLogLevel($fileMinLevel);

$consoleLogger->info("== Logger ==" . PHP_EOL);

// Message to console
$consoleLogger->writeLog(LogLevel::INFO, 'This is an informational message');
$consoleLogger->writeLog(LogLevel::DEBUG, 'This is a debug message');
$consoleLogger->writeLog(LogLevel::WARNING, 'This is a warning message');
$consoleLogger->writeLog(LogLevel::ERROR, 'This is an error message');

// Message to file
$fileLogger->writeLog(LogLevel::DEBUG, 'This is a generic logging message');

// Message to mail
$emailLogger->writeLog(LogLevel::ERROR, 'This is an error message');