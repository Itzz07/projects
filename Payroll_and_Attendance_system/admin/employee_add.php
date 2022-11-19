<?php
	include 'includes/session.php';

	if(isset($_POST['add'])){
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
		$filename = $_FILES['photo']['name'];
		if(!empty($filename)){
			move_uploaded_file($_FILES['photo']['tmp_name'], '../images/'.$filename);	
		}
		//creating employeeid
		$letters = '';
		$numbers = '';
		foreach (range('A', 'Z') as $char) {
		    $letters .= $char;
		}
		for($i = 0; $i < 10; $i++){
			$numbers .= $i;
		}
		$password = $employee_id = substr(str_shuffle($letters), 0, 3).substr(str_shuffle($numbers), 0, 9);
		//
		$sql = "INSERT INTO employees (employee_id, password, firstname, lastname, address, birthdate, marital_status, nationality, contact_info, email, gender, department, qualification, position_id, schedule_id, photo, created_on) VALUES ('$employee_id', '$password', '$firstname', '$lastname', '$address', '$birthdate', '$marital_status', '$nationality', '$contact', '$email', '$gender', '$department', '$qualification', '$position', '$schedule', '$filename', NOW())";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Employee added successfully';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}

	}
	else{
		$_SESSION['error'] = 'Fill up add form first';
	}

	header('location: employee.php');
?>