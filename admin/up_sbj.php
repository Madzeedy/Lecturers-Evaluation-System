<?php
$stdid = $_GET['ref'];

include 'check_login.php';
$name = $_POST['name'];
$code = $_POST['code'];
$modules = $_POST['modules'];

include '../db_config/connection.php';
$sql = "SELECT * FROM subject where name='$name' or code = '$code' and id!='$stdid'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

    while($row = $result->fetch_assoc()) {
		$fullname22 = $row['full_name'];
       header("location:update_sbj.php?ref=$stdid&msg=Subejct $name is already registred");
    }
} else {
    include '../db_config/connection.php';
$sql = "UPDATE subject SET name='$name', code='$code', modules='$modules' WHERE id='$stdid'";

if ($conn->query($sql) === TRUE) {
	?>
			<script type="text/javascript">
				alert('Successfully updated!');
				window.location.href='update_sbj.php?ref=$stdid';
			</script>
			<?php
   header("location:update_sbj.php?ref=$stdid");
} else {
$error = $conn->error;
     header("location:update_sbj.php?ref=$stdid&error=$error");
}

$conn->close();
}
$conn->close();




?>