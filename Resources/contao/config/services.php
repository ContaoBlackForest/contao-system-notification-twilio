<?php

/**
 * Copyright © ContaoBlackForest
 *
 * @package   contao-system-notification-twilio
 * @author    Sven Baumann <baumann.sv@gmail.com>
 * @author    Dominik Tomasi <dominik.tomasi@gmail.com>
 * @license   GNU/LGPL
 * @copyright Copyright 2014-2016 ContaoBlackForest
 */

$container->extend(
    'system-notification.configuration',
    function ($configurationService) {
        $configurationService->setConfig(
            'twilio',
            array(
                'twilioSms',
                'ContaoBlackForest\SystemNotification\Twilio\Controller\SmsMmsController'
            )
        );

        $configurationService->setConfig(
            'twilio',
            array(
                'twilioMms',
                'ContaoBlackForest\SystemNotification\Twilio\Controller\SmsMmsController'
            )
        );

        return $configurationService;
    }
);
