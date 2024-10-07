<?php

require_once 'config.php';
require_once'helper.php';

require_once 'models/query1.php';
require_once 'models/query2.php';
require_once 'models/query3.php';
require_once 'models/query4.php';
require_once 'models/query5.php';
require_once 'models/query6.php';
require_once 'models/query7.php';
require_once 'models/query8.php';
require_once 'models/query9.php';
require_once 'models/query10.php';
require_once 'models/query11.php';

session_start();

$connectionInfo = array("Database" => DB_DATABASE, "UID" => DB_USERNAME, "PWD" => DB_PASSWORD, "CharacterSet" => "UTF-8");
$connection = sqlsrv_connect(DB_HOST, $connectionInfo);

if (!$connection) {
    echo "Connection could not be established.<br />";
    die(print_r(sqlsrv_errors(), true));
}

