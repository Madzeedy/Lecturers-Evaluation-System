<?php
if(isset($_POST['newstd'])) {
$name = $_POST['name'];
$modules = $_POST['modules'];
$department = $_POST['department'];
$code = $_POST['code'];
// $department = $_POST['department'];
}else{
	header("location:./");
}

include '../db_config/connection.php';

// if ( !filter_var($stdem,FILTER_VALIDATE_EMAIL) ) {
// 			$error = true;
// 			$emailError = "Please enter valid email address.";
// 			?>
		<!-- 	<script type="text/javascript">
// 				alert('Enter valid email address!');
// 				window.location.href='new_lecturer.php';
// 			</script> -->
			<?php
// 		}

			
				$sql = "SELECT * FROM subject where name = '$name' OR code='$code'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

    while($row = $result->fetch_assoc()) {
		$student = $row['full_name'];
       header("location:new_subject.php?msg=Subject with name = $name is already in the system with module code =$code&name=$name&modules=$modules&code=$code");
    }
} else {
  $regdate = date('jS \ F Y h:i:s A');
$stdno = 'STD:'.rand(1000,9999).'/'.rand(10,99).'/'.rand(0,9).'';

include '../db_config/connection.php';
$role="Lecturer";
$sql = "INSERT INTO subject (name, modules, code, department)
VALUES ('$name', '$modules', '$code', '$department')";

if ($conn->query($sql) === TRUE) {
    header("location:new_subject.php?message=Subject with name $name have successfully registered !!");
} else {
	$error = $conn->error;
     header("location:new_subject.php?err=$error");
}

$conn->close();



}


$conn->close();

?>


