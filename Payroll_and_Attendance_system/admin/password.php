<?php
	include 'includes/session.php';

	if(isset($_GET['return'])){
		$return = $_GET['return'];
		
	}
	else{
		$return = 'home.php';
	}

	if(isset($_POST['save'])){
		$curr_password = $_POST['curr_password'];
		$username = $_POST['username'];
		$password = $_POST['password'];
        
		if($curr_password == $password){
			$$curr_password == $password;
        }
        else{
            $_SESSION['error'] = 'Incorrect password';
            $password = password_hash($password, PASSWORD_DEFAULT);
        }
		
		$password = password_hash($password, PASSWORD_DEFAULT);
        $sql = "UPDATE admin SET username = '$username', password = '$password' WHERE id = '".$user['id']."'";
        if($conn->query($sql)){
            $_SESSION['success'] = 'Admin Credentials Changed successfully';
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