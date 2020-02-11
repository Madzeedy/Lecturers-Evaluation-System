<?php
$page = $_GET['page'];
$stdno = $_GET['ref'];

include '../db_config/connection.php';

$sql = "DELETE FROM subject WHERE id='$stdno'";

if ($conn->query($sql) === TRUE) {
    header("location:subjects.php");
} else {
    header("location:subjects.php");
}

$conn->close();

?>