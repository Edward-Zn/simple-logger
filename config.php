<?php

require_once('LogLevel.php');

return [
    'log' => [
        'console' => [
            'min_level' => LogLevel::WARNING,
        ],
        'email' => [
            'min_level' => LogLevel::ERROR,
            'mail' => [
                'admin@dev.com'
            ],
        ],
        'file' => [
            'min_level' => LogLevel::DEBUG,
            'file_path' => 'log.txt',
        ],
    ],
];