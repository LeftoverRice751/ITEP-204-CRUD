<?php
if (isset($_GET["userid"])) {
    $userid = $_GET["userid"];

    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "crud1";

    $connection = new mysqli($servername, $username, $password, $database);

    if ($connection->connect_error) {
        die("Connection failed: " . $connection->connect_error);
    }

    $sql = "DELETE FROM users WHERE userid = $userid";
    $connection->query($sql);
}

header("Location: /adminsim/htmls/read.php");
exit;
?>
