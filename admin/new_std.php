<?php
if(isset($_POST['newstd'])) {
$stdname = $_POST['name'];
$stdem = $_POST['email'];
$stdadd = $_POST['address'];
$gender = $_POST['gender'];
$department = $_POST['department'];
$regno = $_POST['regno'];
}else{
	header("location:./");
}

include '../db_config/connection.php';
if ( !filter_var($stdem,FILTER_VALIDATE_EMAIL) ) {
			$error = true;
			$emailError = "Please enter valid email address.";
			?>
			<script type="text/javascript">
				alert('Enter valid email address!');
				// window.location.href='new_student.php';
				<?php  ?>
			</script>
			<?php
			header("location:new_student.php?msgs=Email $stdem is not valid&students=$student&name=$stdname&regno=$regno&email=$stdem&address=$stdadd&gender=$gender");
		}
			if( !$error ) {

$sql = "SELECT * FROM user_info where email = '$stdem' or user_id='$regno'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

    while($row = $result->fetch_assoc()) {
		$student = $row['full_name'];
       header("location:new_student.php?msg=Email $stdem is not available&student=$student&name=$stdname&regno=$regno&email=$stdem&address=$stdadd&gender=$gender");
    }
} else {
  $regdate = date('jS \ F Y h:i:s A');
$stdno = 'STD:'.rand(1000,9999).'/'.rand(10,99).'/'.rand(0,9).'';

include '../db_config/connection.php';

$sql = "INSERT INTO user_info (user_id, full_name, gender, email, address, regdate, department)
VALUES ('$regno', '$stdname', '$gender', '$stdem', '$stdadd', '$regdate', '$department')";

if ($conn->query($sql) === TRUE) {
    header("location:new_student.php?message=$stdname have been registered !!
    	");
} else {
	$error = $conn->error;
     header("location:new_student.php?err=$error");
}

$conn->close();



}
			}
$conn->close();

?>


