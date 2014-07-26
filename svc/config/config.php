<?php
/**
 * Configuration file for SVC-SR 0.7+
 * Help: http://www.videosoftware.pro/forum/THREAD-Installing-and-configuring-SVC-SR-video-chat
 */

/* database configuration */
$MYSQL_DB_HOST = "localhost";                 // database host
$MYSQL_DB_PORT = "3306";                      // database port (optional)
$MYSQL_DB_USER = "";                          // database username
$MYSQL_DB_PASS = "";                          // database password
$MYSQL_DB_NAME = "";                          // database name

$VALID_INTERVAL = 30;                         // sec. - remove username from db if no status update for N seconds

/* connection settings */
$PING_INTERVAL = 5 * 1000;                    // sec. - ping server for updates every N seconds
$REQUEST_CONFIG_INTERVAL = 720 * 60000;       // min. - reload configuration file after N minutes
$INVITATION_SENT_TIMEOUT = 3 * 1000;          // sec. - timeout to wait for a serponse (available/busy) from a pinged partner; starts after ping was sent
$FIND_NEXT_BUTTON_ACTIVATION_TIMEOUT = 5;     // sec. - timeout (countdown) before NEXT button is activated; starts after successful connection
$FIND_NEXT_ACTIVATION_TIMEOUT = 2 * 1000;     // sec. - idle (available) timeout before SVC starts to look for a new partner; starts after NEXT is pressed

/* system settings */
$HIDE_AGE_FEMALE = true;                      // hide age if user is female (true/false) 
$HIDE_AGE_MALE = false;                       // hide age if user is male (true/false)

// Please edit /config/config.xml to set service and config URLs and locale

?>