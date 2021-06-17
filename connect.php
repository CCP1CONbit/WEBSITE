<?php
//$servername = "localhost";
//$username = "id16912847_user";
//$pass = "Password@2021";
//$databasename = "id16912847_cricket";

$servername = "localhost";
$username = "root";
$pass = "";
$databasename = "crazycricket";
$conn = new mysqli($servername, $username, $pass, $databasename);
if($conn->connect_error)
{
    die("connection failed:".$conn->connect_error);
}
echo "connected succesfully";




