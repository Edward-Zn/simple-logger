<?php

class FileLogTarget extends LogTarget {
    private $logFile;

    public function __construct($logFile)
    {
        $this->logFile = $logFile;
    }

    public function writeLog($level, $message)
    {
        $formattedMessage = date('Y-m-d H:i:s') . " [$level] $message\n";

        // File lock for preventing concurrent writes
        $fileHandle = fopen($this->logFile, 'a');
        if (flock($fileHandle, LOCK_EX)) {
            fwrite($fileHandle, $formattedMessage);
            flock($fileHandle, LOCK_UN);
        }
        fclose($fileHandle);

        print_r('Log has been updated in: ' . $this->logFile  . PHP_EOL);
    }
}