<?php
	session_start();
	include 'includes/conn.php';

	if(isset($_POST['login'])){
		$username = $_POST['username'];
		$password = $_POST['password'];

		$sql = "SELECT * FROM admin WHERE username = '$username'";
		$query = $conn->query($sql);

		$sql1 = "SELECT * FROM employees WHERE employee_id = '$username'";
		$query1 = $conn->query($sql1);

		if($query->num_rows < 1 ){
			if(isset($_POST['login'])){
				
				if($query1->num_rows < 1){
					$_SESSION['error'] = 'Cannot find account with the username';
				}
				else{
					$row = $query1->fetch_assoc();
					if($password == $row['password'] || password_verify($password, $row['password'])){
						$_SESSION['employees'] = $row['id'];
						$_SESSION['error'] = 'i was login but shit happened';

					}
					else{
						$_SESSION['error'] = 'Incorrect Employee password';
					}
				}

			}
			else{
				$_SESSION['error'] = 'Cannot find admin account with the username';
			}
		}
		else{ 
			$row = $query->fetch_assoc();
			if(password_verify($password, $row['password'])){
				$_SESSION['admin'] = $row['id'];
			}
			else{
				$_SESSION['error'] = 'Incorrect admin password';
			}
		}
		
	}
	else{
		$_SESSION['error'] = 'Input credentials first';
	}
	header('location: base.php');

?>