<?php

$host = "localhost";
$dbname = "gym";
$username = "root";
$pass = "";

$mysqli = new mysqli($host, $username, $pass, $dbname);

if($mysqli->connect_errno)
{
    die("Connection Error : " .$mysqli->error);
}

function insertDB($sql)
{
    global $mysqli;

    $stmt = $mysqli->stmt_init();
    if(!$stmt->prepare($sql))
    {
        die("SQL Error : ".$mysqli->error);
    }
    return $stmt;
}

return $mysqli;
