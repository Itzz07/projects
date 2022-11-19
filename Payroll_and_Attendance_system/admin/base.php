<?php
  session_start();
  if(isset($_SESSION['admin'])){
    header('location:home.php');
  }
 if( isset($_SESSION['employees'])) {
    header('location:../employee/home.php');
} 
?>

<style>
body{
	height: 100vh;
	padding: 10px;
	background: linear-gradient(rgba(0,0,0,0.2),rgba(0,0,0,0.5)),url(../login.jpg ) center!important;
	display:block;
	flex-direction: column;
	align-items: center;
	justify-content: center;
	}

.login-box-body{
	overflow: hidden;
	border: 0 !important;
	border-radius: 20px !important;
	box-shadow: 0 0.5rem 1rem 0 rgba(0, 0, 0, 0.1);
	}
.logo{
	color: white;
	text-align: left;
	margin: 20px;
}
.login-logo{
	color: #4166f5;
}
.logo span{
	color: goldenrod;
}
</style>

<?php include 'includes/header.php'; ?>

<header>
<div class="logo">
<a href="index.html" class="logo">
    <h1 class="logo">CASH<span>Code.</span></h1>
</a>
</div>
</header>


<body class="hold-transition login-page">
<div class="login-box">
  	<div class="login-logo">
  		<b>Log In</b>
  	</div>
  
  	<div class="login-box-body">
    	<p class="login-box-msg">Sign in to start your session</p>

    	<form action="login.php" method="POST">
      		<div class="form-group has-feedback">
        		<input type="text" class="form-control" name="username" placeholder="user ID" required autofocus>
        		<span class="glyphicon glyphicon-user form-control-feedback"></span>
      		</div>
          <div class="form-group has-feedback">
            <input type="password" class="form-control" name="password" placeholder="Password" required>
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
      		<div class="row">
    			<div class="col-xs-4">
          			<button type="submit" class="btn btn-primary btn-block btn-flat" name="login"><i class="fa fa-sign-in"></i> Sign In</button>
        		</div>
      		</div>
    	</form>
  	</div>
  	<?php
  		if(isset($_SESSION['error'])){
  			echo "
  				<div class='callout callout-danger text-center mt20'>
			  		<p>".$_SESSION['error']."</p> 
			  	</div>
  			";
  			unset($_SESSION['error']);
  		}
  	?>
</div>
	
<?php include 'includes/scripts.php' ?>
</body>
</html>