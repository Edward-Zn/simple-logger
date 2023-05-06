<?php

class EmailLogTarget extends LogTarget {
    private $emailTo;
    private $emailFrom;
    private $emailSubject;

    public function __construct($emailTo, $emailFrom, $emailSubject)
    {
        $this->emailTo = $emailTo;
        $this->emailFrom = $emailFrom;
        $this->emailSubject = $emailSubject;
    }

    public function writeLog($level, $message)
    {
        $headers = "From: " . $this->emailFrom . "\r\n";
        $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

        $body = "Log level: " . $level . "\r\n";
        $body .= "Log message: " . $message . "\r\n";

        // Processing for multiple emails. This is set in config.php
        if (is_array($this->emailTo)) {
            foreach ($this->emailTo as $email) {
                mail($email, $this->emailSubject, $body, $headers);
            }

            $recipients = implode(', ', $this->emailTo);
        } else {
            mail($this->emailTo, $this->emailSubject, $body, $headers);

            $recipients = $this->emailTo;
        }

        print_r('Log sent to: ' . $recipients  . PHP_EOL);
    }
}