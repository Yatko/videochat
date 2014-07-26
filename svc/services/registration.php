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

/**
 * Removes all phantom registrations.
 */
function remove_all_phantom_users($connection) {
	global $VALID_INTERVAL;
	
    $q = "
        DELETE FROM registrations
        WHERE updatetime <= DATE_ADD(NOW(), INTERVAL -" . $VALID_INTERVAL . " SECOND)
    ";
    mysql_query($q, $connection);
}
/**
 * Registers or updates the given user. All the timeouted regsiartions will be cleared to maintain a clean database.
 */
function register_user($connection, $user_name, $id, $partner) {
    $q = "
        SELECT username
        FROM registrations
        WHERE username = '" . $user_name . "'
    ";
    $check = mysql_query($q, $connection);
    $partner_sql = empty($partner) ? "NULL" : "'" . $partner . "'";

    if (mysql_num_rows($check) == 1) {
        $q = "
            UPDATE registrations
            SET
                id = '" . $id . "',
                updatetime = NOW(),
                partner = " . $partner_sql . "
            WHERE username = '" . $user_name . "'
        ";
    } else {
        $q = "
            INSERT INTO registrations(username, id, updatetime, partner)
            VALUES('" . $user_name . "', '" . $id . "', NOW(), " . $partner_sql . ")
        ";
    }
    mysql_query($q, $connection);
}
/**
 * Returns the id of the current user.
 */
function get_user_if_valid($connection, $user_name) {
	global $VALID_INTERVAL;
	
    /**
    $q = "
        SELECT username, id
        FROM registrations
        WHERE
            username = '" . $user_name . "' AND
            updatetime > DATE_ADD(NOW(), INTERVAL -" . $VALID_INTERVAL . " SECOND)
    ";
    /**/
    
    $q = "
        SELECT username, id
        FROM registrations
        WHERE username = '" . $user_name . "'
    ";
    $res = mysql_query($q, $connection);
    $row = mysql_fetch_array($res);
    return $row;
}
/**
 * Return an array of valid users and its connected parteners, different than the requesting one.
 */
function get_all_valid_users($connection, $user_name) {
	global $VALID_INTERVAL;
	
    $q = "
        SELECT username, partner
        FROM registrations
        WHERE
            username <> '" . $user_name . "' AND
            updatetime > DATE_ADD(NOW(), INTERVAL -" . $VALID_INTERVAL . " SECOND)
        ORDER BY username ASC
    ";
    $res = mysql_query($q, $connection);
    $array = array();
    while ( $row = mysql_fetch_array($res) ) {
        array_push($array, $row);
    }
    return $array;
}
function get_first_user_without_partner($connection, $user_name) {
	global $VALID_INTERVAL;
	
    $q = "
        SELECT username, id
        FROM registrations
        WHERE
            username <> '" . $user_name . "' AND
            updatetime > DATE_ADD(NOW(), INTERVAL -" . $VALID_INTERVAL . " SECOND) AND
	    partner is NULL
        LIMIT 0, 1
    ";
    $res = mysql_query($q, $connection);
    $row = mysql_fetch_array($res);
    return $row;
}
function get_random_user_without_partner($connection, $user_name) {
	global $VALID_INTERVAL;
	
    $q = "
        SELECT username, id
        FROM registrations
        WHERE
            username <> '" . $user_name . "' AND
            updatetime > DATE_ADD(NOW(), INTERVAL -" . $VALID_INTERVAL . " SECOND) AND
	    partner is NULL
    ";
    $res = mysql_query($q, $connection);
    $array = array();
    while ( $row = mysql_fetch_array($res) ) {
        array_push($array, $row);
    }
    return $array[array_rand($array)];
}

define(PROP_RESULT,     "result");
define(PROP_ACTION,     "action");
define(PROP_SUCCESS,    "success");
define(PROP_ERROR,      "error");
define(PROP_PARTNER,    "partner");
define(PROP_LIST,       "list");
define(PROP_USER,       "user");
define(PROP_ID,         "id");
define(NEW_LINE,        "\n");

define(GET_ACTION,  "action");
define(GET_USERNAME,"username");
define(GET_ID,      "id");
define(GET_PARTNER, "partner");

define(ACTION_TYPE_REGISTER,    "register");
define(ACTION_TYPE_UNREGISTER,  "unregister");
define(ACTION_TYPE_LOOKUP,      "lookup");
define(ACTION_TYPE_PING,        "ping");
define(ACTION_TYPE_LIST,        "list");
define(ACTION_TYPE_FIND,        "find");


$action = $_GET[GET_ACTION];
$user_name = $_GET[GET_USERNAME];
$id = $_GET[GET_ID];
$partner = $_GET[GET_PARTNER];


$res = "";
$res .= "<?xml version='1.0' encoding='utf-8'?>" . NEW_LINE;
$res .= "<" . PROP_RESULT . ">" . NEW_LINE;
$res .= "\t<" . PROP_ACTION . ">" . $action . "</" . PROP_ACTION . ">" . NEW_LINE;

try {
    $connection = mysql_pconnect($MYSQL_DB_HOST . ":" . $MYSQL_DB_PORT, $MYSQL_DB_USER, $MYSQL_DB_PASS);
    if (!mysql_ping($connection)) {
        $connection = mysql_pconnect($MYSQL_DB_HOST . ":" . $MYSQL_DB_PORT, $MYSQL_DB_USER, $MYSQL_DB_PASS);
    }
    $db_select = mysql_select_db($MYSQL_DB_NAME, $connection);

    if ($connection == FALSE) {
        $res .= "\t<" . PROP_ERROR . ">Cannot connect to database server [" . $MYSQL_DB_HOST . ":" . $MYSQL_DB_PORT . "@" . $MYSQL_DB_USER . "]</" . PROP_ERROR . ">" . NEW_LINE;
        throw new Exception("Could not connect to the MqSql server: [" . $MYSQL_DB_HOST . ":" . $MYSQL_DB_PORT . "@" . $MYSQL_DB_USER . "]");
    } else if ($db_select == FALSE) {
        $res .= "\t<" . PROP_ERROR . ">Cannot use the given [" . $MYSQL_DB_NAME . "] database</" . PROP_ERROR . ">" . NEW_LINE;
        throw new Exception("Could select MySql database: " . $MYSQL_DB_NAME);
    }

    remove_all_phantom_users($connection);

    if ($action == ACTION_TYPE_REGISTER) {
        register_user($connection, $user_name, $id, null);
    }
    else if ($action == ACTION_TYPE_UNREGISTER) {
        register_user($connection, $user_name, "0", null);
    }
    else if ($action == ACTION_TYPE_LOOKUP) {
        if ( !empty($partner) ) {
            $array_partner = get_user_if_valid($connection, $partner);
            if ( $array_partner ) {
                $res .= "\t<" . PROP_PARTNER . ">" . NEW_LINE;
                $res .= "\t\t<" . PROP_USER . ">" . $array_partner['username'] . "</" . PROP_USER . ">" . NEW_LINE;
                $res .= "\t\t<" . PROP_ID . ">" . $array_partner['id'] . "</" . PROP_ID . ">" . NEW_LINE;
                $res .= "\t</" . PROP_PARTNER . ">" . NEW_LINE;
            }
        } else {
            $res .= "\t<" . PROP_ERROR . ">Partner could not be empty</" . PROP_ERROR . ">" . NEW_LINE;
            throw new Exception("Empty partner");
        }
    }
    else if ($action == ACTION_TYPE_PING) {
        register_user($connection, $user_name, $id, $partner);
    }
    else if ($action == ACTION_TYPE_LIST) {
        $array_users = get_all_valid_users($connection, $user_name);
        foreach ( $array_users as $user ) {
            $res .= "\t<" . PROP_LIST . ">" . NEW_LINE;
            $res .= "\t\t<" . PROP_USER . ">" . $user['username'] . "</" . PROP_USER . ">" . NEW_LINE;
            $res .= "\t\t<" . PROP_PARTNER . ">" . $user['partner'] . "</" . PROP_PARTNER . ">" . NEW_LINE;
            $res .= "\t</" . PROP_LIST . ">" . NEW_LINE;
        }
    }
    else if ($action == ACTION_TYPE_FIND) {
        $array_partner = get_random_user_without_partner($connection, $user_name);
	if ( $array_partner ) {
	    $res .= "\t<" . PROP_PARTNER . ">" . NEW_LINE;
            $res .= "\t\t<" . PROP_USER . ">" . $array_partner['username'] . "</" . PROP_USER . ">" . NEW_LINE;
	    $res .= "\t\t<" . PROP_ID . ">" . $array_partner['id'] . "</" . PROP_ID . ">" . NEW_LINE;
            $res .= "\t</" . PROP_PARTNER . ">" . NEW_LINE;
	}
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
