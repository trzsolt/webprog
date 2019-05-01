<?php

$dbServername = "127.0.0.1";
$dbUsername = "id9483224_users_db";
$dbPassword = "id9483224_webprog_nebulo";
$dbName = "id9483224_users_db";

$conn = new mysqli($dbServername, $dbUsername, $dbPassword, $dbName);
if ($conn->connect_error) {
    die("Sikertelen csatlakozás: " . $conn->connect_error);
}
?>
