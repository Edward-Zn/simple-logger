<?php

// Independent logger class for manual use

class Logger
{
    private $logTargets = [];

    public function addLogTarget(LogTarget $logTarget) {
        $this->logTargets[] = $logTarget;
    }

    public function removeLogTarget(LogTarget $logTarget) {
        $index = array_search($logTarget, $this->logTargets);
        if ($index !== false) {
            unset($this->logTargets[$index]);
        }
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