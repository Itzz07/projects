<?php
	include 'includes/session.php';

	if(isset($_POST['edit'])){
		$empid = $_POST['id'];
		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$birthdate = $_POST['birthdate'];
		$address = $_POST['address'];
		$gender = $_POST['gender'];
		$marital_status = $_POST['marital_status'];
		$nationality = $_POST['nationality'];
		$contact = $_POST['contact'];
		$email = $_POST['email'];
		$qualification = $_POST['qualification'];
		$department = $_POST['department'];
		$position = $_POST['position'];
		$schedule = $_POST['schedule'];
		$sql = "UPDATE employees SET firstname = '$firstname', lastname = '$lastname', birthdate = '$birthdate', address = '$address', gender = '$gender', marital_status = '$marital_status', nationality = '$nationality', contact_info = '$contact', email = '$email', qualification = '$qualification', department = '$department', position_id = '$position', schedule_id = '$schedule' WHERE id = '$empid'";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Employee updated successfully';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}

	}
	else{
		$_SESSION['error'] = 'Select employee to edit first';
	}

	header('location: employee.php');
?>