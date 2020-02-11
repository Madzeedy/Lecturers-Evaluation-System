<?php
$page = $_GET['page'];
$stdno = $_GET['ref'];

include '../db_config/connection.php';

$sql = "DELETE FROM user_info WHERE user_id='$stdno'";

if ($conn->query($sql) === TRUE) {
    header("location:lecturers.php");
} else {
    header("location:lecturers.php");
}

$conn->close();

?>