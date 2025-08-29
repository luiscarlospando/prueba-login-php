<?php
$host = "localhost";
$user = "u655066227_luis_pando";
$pass = "8t^b^X2XBHU]";
$db = "u655066227_prueba_login";

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";
