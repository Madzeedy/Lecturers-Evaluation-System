<?php
$page = $_GET['page'];
$stdno = $_GET['ref'];

include '../db_config/connection.php';

$sql = "DELETE FROM user_info WHERE user_id='$stdno'";

if ($conn->query($sql) === TRUE) {
    header("location:students.php");
} else {
    header("location:students.php");
}

$conn->close();

?>