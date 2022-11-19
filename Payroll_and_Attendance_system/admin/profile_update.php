<?php
	include 'includes/session.php';

	if(isset($_GET['return'])){
		$return = $_GET['return'];
		
	}
	else{
		$return = 'home.php';
	}

	if(isset($_POST['save'])){
		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$photo = $_FILES['photo']['name'];
		if(!empty($photo)){
			move_uploaded_file($_FILES['photo']['tmp_name'], '../images/'.$photo);
			$filename = $photo;	
		}
		else{
			$filename = $user['photo'];
		}

		$sql = "UPDATE admin SET firstname = '$firstname', lastname = '$lastname', photo = '$filename' WHERE id = '".$user['id']."'";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Admin profile updated successfully';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}

	}
	else{
		$_SESSION['error'] = 'Fill up required details first';
	}

	header('location:'.$return);

?>