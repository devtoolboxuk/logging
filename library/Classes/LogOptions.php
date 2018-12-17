<?php

namespace devtoolboxuk\logging\Classes;

/**
 * Class LogOptions
 * @package devtoolboxuk\logging\Classes
 */
class LogOptions
{

    public function getOptions()
    {
        return [
            'Level' => \Monolog\Logger::DEBUG,
            'ChannelName' => 'log',
            'Handlers' => [
                'RotatingFile' => [
                    'active' => 0,
                    'fileNumber' => 3,
                    'log_path' => '',
                    'fileName' => 'web',
                    'application' => 'website',
                ],
                'Slack' => [
                    'active' => 0,
                    'token' => 'xoxb-',
                    'user' => 'Aegis',
                    'channel' => '#general',
                    'attachment' => true,
                    'icon' => 'shield'
                ]
            ]
        ];
    }
}