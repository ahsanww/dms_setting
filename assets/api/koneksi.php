<?php
//$db_handle = mysqli_connect("192.168.0.126", "global", "mgi", "dms");
$db_handle = mysqli_connect("localhost", "user", "mgi", "dms");
//$db_handle = mysqli_connect("localhost", "root", "", "dms");

if (!$db_handle) {
    echo "Error: Unable to connect to MySQL." . PHP_EOL;
    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    exit;
}
?>