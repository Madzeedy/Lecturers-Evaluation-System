<?php
include 'check_login.php';

include '../db_config/connection.php';

$sql = "DELETE FROM user_info WHERE role='Lecturer'";

if ($conn->query($sql) === TRUE) {
    header("location:./?db33");
} else {
    header("location:./?db13");
}

$conn->close();

?>