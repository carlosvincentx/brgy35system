<?php
if ( isset($_GET["id"])) {
    $id = $_GET["id"];

    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "brgy_db";

    // Creates connection
    $connection = new mysqli($servername, $username, $password, $database);

    $sql = "DELETE FROM brgyofficials WHERE id=$id";
    $connection->query($sql);

    header("location: /brgy/brgyofficials.php");
    exit;
}
?>