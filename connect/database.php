<?php
define("hostname", "localhost", true);
define("user", "moderator", true);
define("password", "6503916162", true);
define("database", "freelance", true);

function db_connect()
{
    return mysqli_connect(hostname, user, password, database);
}

$mysqli = db_connect();
$mysqli->query("SET SQL_SAFE_UPDATES = 0");
?>