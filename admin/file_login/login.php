<?php session_start(); 

?>

<head>
    <link rel="icon" type="image/png" href="../../logo/logo_sekolah.png">
</head>

<?php require "function.php" ?>

<?php 
	if(isset($_POST["login"])){

		$username = $_POST["username"];
		$password = $_POST["password"];

		$result = mysqli_query($conn, "SELECT * FROM admin WHERE username = '$username'");

		// cek username
		if( mysqli_num_rows($result) == 1 ){

				// kalau ada username, cek password nya
				$row = mysqli_fetch_assoc($result);
				if($row["password"] == $password){

					// set session
					$_SESSION["login"] = true;

					if($username == "admin"){
						header("Location: ../file_dashboard/data_dashboard.php");
						exit;
					}
					else if($username == "pegawai"){
						header("Location: ../guest/file_dashboard/data_dashboard.php");
						exit;
					}
				}
		}


		$error = true;


	}

 ?>





<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login Admininstrator</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
 
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
<!--===============================================================================================-->
	<style>
		#body{
			background-size:cover;
			filter: blur(1px);
			position:fixed;
			z-index : -1;
		}
		#isi{
			margin:auto;
			position:relative;
			
		}
		.badan{
			padding-top:6%;
			box-sizing : border-box;

		}
	</style>
</head>
<body >
	<div class="limiter">
		<div class="container-login100"  id="body"></div>
			<div class="badan">
			<div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-50" id="isi" class="isi">
			<form action="" method="post">
					<span class="login100-form-title p-b-33">
						Login Admin
					</span>

					<?php if(isset($error)) :?>
							<p class="alert alert-danger">username / password salah</p>
					<?php endif ?>
					<!-- username -->
					<div class="wrap-input100 validate-input" >
						<input class="input100"  placeholder="Masukkan Username" type="text" name="username" id="username" autocomplete="off"   required>
						<span class="focus-input100-1"></span>
						<span class="focus-input100-2"></span>
					</div>
					
					<!-- password -->
					<div class="wrap-input100 rs1 validate-input" >
						<input class="input100" placeholder="Masukkan Password"  type="password"  name="password" id="password" required>
						<span class="focus-input100-1"></span>
						<span class="focus-input100-2"></span>
					</div>

					<div class="container-login100-form-btn m-t-20">
						<button class="login100-form-btn" type="submit" name="login">
							Login
						</button>
					</div>

					<div class="text-center p-t-45 p-b-4">
						<span class="txt1">
							<a href="../../index.php">Kembali Ke Home</a>
						</span>

				</form>
			</div>
			</div>
	</div>
	

	
<!--===============================================================================================-->
	

</body>
</html>