<?php

abstract class LogTarget
{
    const TARGET_CONSOLE = 'console';
    const TARGET_FILE = 'file';
    const TARGET_EMAIL = 'email';

    protected $logTargets = [
        self::TARGET_CONSOLE,
        self::TARGET_FILE,
        self::TARGET_EMAIL
    ];
    protected $minLogLevel = LogLevel::DEBUG;

    abstract function writeLog($level, $message);

    public function setMinLogLevel($level) {
        $this->minLogLevel = $level;
    }

    public function setMinLevel($level) {
        $this->minLogLevel = $level;
    }
    
    protected function isLogLevelAccepted($level) {
        $levels = [
            LogLevel::DEBUG,
            LogLevel::INFO,
            LogLevel::WARNING,
            LogLevel::ERROR,
        ];

        $minLevelIndex = array_search($this->minLogLevel, $levels);
        $levelIndex = array_search($level, $levels);

        return $levelIndex >= $minLevelIndex;
    }

    public function getLogTargets() {
        return $this->logTargets;
    }

    public function debug($msg = 'debug')
    {
        print($msg . PHP_EOL);
    }

    public function info($msg = 'info')
    {
        print($msg . PHP_EOL);
    }

    public function warning($msg = 'warning')
    {
        print($msg . PHP_EOL);
    }

    public function error($msg = 'error')
    {
        print($msg . PHP_EOL);
    }
}