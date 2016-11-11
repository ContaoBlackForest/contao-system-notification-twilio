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

/**
 * extend table tl_system_notification
 */

/**
 * Sub palettes
 */
$GLOBALS['TL_DCA']['tl_system_notification']['subpalettes']['service_twilio.twilioSms'] =
    'account,secret,phoneFrom,phoneTo,messageSmsMms';
$GLOBALS['TL_DCA']['tl_system_notification']['subpalettes']['service_twilio.twilioMms'] =
    'account,secret,phoneFrom,phoneTo,messageSmsMms';


/**
 * Fields
 */

$fields = array(
    'account' => array
    (
        'label'                   => &$GLOBALS['TL_LANG']['tl_system_notification']['account'],
        'exclude'                 => true,
        'inputType'               => 'text',
        'eval'                    => array('mandatory'=>true, 'rgxp'=>'alnum', 'maxlength'=>255, 'tl_class'=>'w50 clr'),
        'sql'                     => "varchar(255) NOT NULL default ''"
    ),
    'secret' => array
    (
        'label'                   => &$GLOBALS['TL_LANG']['tl_system_notification']['secret'],
        'exclude'                 => true,
        'inputType'               => 'text',
        'eval'                    => array('mandatory'=>true, 'rgxp'=>'alnum', 'maxlength'=>255, 'tl_class'=>'w50'),
        'sql'                     => "varchar(255) NOT NULL default ''"
    ),
    'phoneFrom' => array
    (
        'label'                   => &$GLOBALS['TL_LANG']['tl_system_notification']['phoneFrom'],
        'exclude'                 => true,
        'inputType'               => 'text',
        'eval'                    => array('mandatory'=>true, 'rgxp'=>'phone', 'maxlength'=>255, 'tl_class'=>'w50'),
        'sql'                     => "varchar(255) NOT NULL default ''"
    ),
    'phoneTo' => array
    (
        'label'                   => &$GLOBALS['TL_LANG']['tl_system_notification']['phoneTo'],
        'exclude'                 => true,
        'inputType'               => 'text',
        'eval'                    => array('mandatory'=>true, 'rgxp'=>'phone', 'maxlength'=>255, 'tl_class'=>'w50'),
        'sql'                     => "varchar(255) NOT NULL default ''"
    ),
    'messageSmsMms' => array
    (
        'label'       => &$GLOBALS['TL_LANG']['tl_system_notification']['messageSmsMms'],
        'exclude'     => true,
        'inputType'   => 'textarea',
        'explanation' => 'systemNotificationSimpleTokens',
        'search'      => true,
        'eval'        => array('tl_class' => 'clr', 'helpwizard' => true),
        'sql'         => "text NULL"
    )
);

$GLOBALS['TL_DCA']['tl_system_notification']['fields'] =
    array_merge($GLOBALS['TL_DCA']['tl_system_notification']['fields'], $fields);
