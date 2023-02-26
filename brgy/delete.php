<?php
if ( isset($_GET["household_no"])) {
    $household_no = $_GET["household_no"];

    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "brgy_db";

    // Creates connection
    $connection = new mysqli($servername, $username, $password, $database);

    $sql = "DELETE FROM rbi WHERE household_no=$household_no";
    $connection->query($sql);

    header("location: /brgy/rbi.php");
    exit;
}
?>