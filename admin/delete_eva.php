<?php
$page = $_GET['page'];
$stdno = $_GET['ref'];

include '../db_config/connection.php';

$sql = "DELETE FROM evaluations WHERE id='$stdno'";

if ($conn->query($sql) === TRUE) {
    header("location:evaluations.php");
} else {
    header("location:evaluations.php");
}

$conn->close();

?>