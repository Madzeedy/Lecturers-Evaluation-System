<?php
$page = $_GET['page'];
$stdno = $_GET['ref'];

include '../db_config/connection.php';

$sql = "DELETE FROM department WHERE id='$stdno'";

if ($conn->query($sql) === TRUE) {
    header("location:departments.php");
} else {
	echo "error";
    header("location:departments.php");
}

$conn->close();

?>