<?php

class ConsoleLogTarget extends LogTarget {
    public function writeLog($level, $message) {
        $colorCode = '';

        switch ($level) {
            case LogLevel::DEBUG:
                $colorCode = "\033[36m"; // Cyan
                break;
            case LogLevel::INFO:
                $colorCode = "\033[32m"; // Green
                break;
            case LogLevel::WARNING:
                $colorCode = "\033[33m"; // Yellow
                break;
            case LogLevel::ERROR:
                $colorCode = "\033[31m"; // Red
                break;
            default:
                $colorCode = "\033[0m"; // Reset color to default
                break;
        }

        // log message with formatting
        if ($this->isLogLevelAccepted($level)) {
            echo $colorCode . '[' . $level . '] ' . $message . "\033[0m" . PHP_EOL;
        }
    }
}