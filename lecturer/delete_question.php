<?php
// $page = $_GET['page'];
$stdno = $_GET['ref'];

include '../db_config/connection.php';

$sql = "DELETE FROM exam WHERE question_id='$stdno'";

if ($conn->query($sql) === TRUE) {
    header("location:examination.php");
} else {
    header("location:examination.php");
}

$conn->close();

?>