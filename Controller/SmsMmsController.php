<?php

/**
 * Copyright © ContaoBlackForest
 *
 * @package   contao-system-notification
 * @author    Sven Baumann <baumann.sv@gmail.com>
 * @author    Dominik Tomasi <dominik.tomasi@gmail.com>
 * @license   GNU/LGPL
 * @copyright Copyright 2014-2016 ContaoBlackForest
 */

namespace ContaoBlackForest\SystemNotification\Twilio\Controller;

use Contao\Config;
use Contao\Controller;
use Contao\Email;
use Contao\StringUtil;
use Contao\UserModel;
use Twilio\Rest\Client;

/**
 * The sms/mms controller who send the system notification.
 */
class SmsMmsController
{
    /**
     * Send the error message to the user.
     *
     * @param array $notification The notification information.
     *
     * @param array $tokens       The simple tokens.
     *
     *
     * @return void
     */
    public function send(array $notification, array $tokens)
    {
        $message = htmlspecialchars(html_entity_decode($notification['messageSmsMms']));

        $message = StringUtil::parseSimpleTokens($message, $tokens);
        $message = Controller::replaceInsertTags($message);

        if ($notification['service'] === 'twilio.twilioSms'
            && strlen($message) > 160
        ) {
            $message = substr($message, 0, 160);
        }

        $client = new Client($notification['account'], $notification['secret']);

        $client->messages->create(
            $notification['phoneTo'],
            array(
                'from' => $notification['phoneFrom'],
                'body' => $message
            )
        );
    }
}
