<?php

/**
 * VIDEOSOFTWARE.PRO
 * Copyright 2011 videosoftware.pro
 * All Rights Reserved.
 *
 * You may NOT sell, resell or redistribute or otherwise make available this software or parts of its source code.
 * See the SVC- License for more details. You should have received a copy of the license along with this software.
 * If not, contact us at <http://www.videosoftware.pro/contact/>.
 */

include "../config/config.php";

define(PROP_RESULT,     "result");
define(PROP_ACTION,     "action");
define(PROP_SUCCESS,    "success");
define(PROP_ERROR,      "error");
define(PROP_CONFIG,      "config");
//the keep alive ping interval (milliseconds)
define(PROP_PING_INTERVAL,      "ping_interval");
//how frequently request this configuration (milliseconds)
define(PROP_REQUEST_CONFIG_INTERVAL,      "request_config_interval");
//this value stands for invitation sent requests but without any response (milliseconds)
define(PROP_INVITATION_SENT_TIMEOUT,      "invitation_sent_timeout");
//after connection established how much time to wait till the find next button became active (seconds)
define(PROP_FIND_NEXT_BUTTON_ACTIVATION_TIMEOUT,      "find_next_button_activation_timeout");
//how much time to wait in idle waiting for a partner to connect (milliseconds)
define(PROP_FIND_NEXT_ACTIVATION_TIMEOUT,      "find_next_activation_timeout");
//hide ages for males (true/false)
define(PROP_HIDE_AGE_MALE,      "hide_age_male");
//hide ages for females (true/false)
define(PROP_HIDE_AGE_FEMALE,      "hide_age_female");
define(NEW_LINE,        "\n");

define(GET_ACTION,  "action");

define(ACTION_TYPE_REQUEST,    "request");


$action = $_GET[GET_ACTION];


$res = "";
$res .= "<?xml version='1.0' encoding='utf-8'?>" . NEW_LINE;
$res .= "<" . PROP_RESULT . ">" . NEW_LINE;
$res .= "\t<" . PROP_ACTION . ">" . $action . "</" . PROP_ACTION . ">" . NEW_LINE;

try {
    if ($action == ACTION_TYPE_REQUEST) {
        $res .= "\t<" . PROP_CONFIG . ">" . NEW_LINE;
	$res .= "\t\t<" . PROP_PING_INTERVAL . ">" . $PING_INTERVAL . "</" . PROP_PING_INTERVAL . ">" . NEW_LINE;
	$res .= "\t\t<" . PROP_REQUEST_CONFIG_INTERVAL . ">" . $REQUEST_CONFIG_INTERVAL . "</" . PROP_REQUEST_CONFIG_INTERVAL . ">" . NEW_LINE;
	$res .= "\t\t<" . PROP_INVITATION_SENT_TIMEOUT . ">" . $INVITATION_SENT_TIMEOUT . "</" . PROP_INVITATION_SENT_TIMEOUT . ">" . NEW_LINE;
	$res .= "\t\t<" . PROP_FIND_NEXT_BUTTON_ACTIVATION_TIMEOUT . ">" . $FIND_NEXT_BUTTON_ACTIVATION_TIMEOUT . "</" . PROP_FIND_NEXT_BUTTON_ACTIVATION_TIMEOUT . ">" . NEW_LINE;
	$res .= "\t\t<" . PROP_FIND_NEXT_ACTIVATION_TIMEOUT . ">" . $FIND_NEXT_ACTIVATION_TIMEOUT . "</" . PROP_FIND_NEXT_ACTIVATION_TIMEOUT . ">" . NEW_LINE;
	$res .= "\t\t<" . PROP_HIDE_AGE_MALE . ">" . $HIDE_AGE_FEMALE . "</" . PROP_HIDE_AGE_MALE . ">" . NEW_LINE;
	$res .= "\t\t<" . PROP_HIDE_AGE_FEMALE . ">" . $HIDE_AGE_MALE . "</" . PROP_HIDE_AGE_FEMALE . ">" . NEW_LINE;
	$res .= "\t</" . PROP_CONFIG . ">" . NEW_LINE;
    }
    else {
        $res .= "\t<" . PROP_ERROR . ">Unhandled action type [" . $action . "]</" . PROP_ERROR . ">" . NEW_LINE;
        throw new Exception("Unhandled action type: " . $action);
    }

    $res .= "\t<" . PROP_SUCCESS . ">true</" . PROP_SUCCESS . ">" . NEW_LINE;
} catch (Exception $ex) {
    $res .= "\t<" . PROP_SUCCESS . ">false</" . PROP_SUCCESS . ">" . NEW_LINE;
}

$res .= "</" . PROP_RESULT . ">" . NEW_LINE;
echo $res;

?>
