<?php 
	include('config.php');
	session_start();

	if(isset($_COOKIE['id']) && isset($_COOKIE['key']) )
	{
		$id = $_COOKIE['id'];
		$key = $_COOKIE['key'];

		$result = mysqli_query($koneksi, "SELECT username FROM user WHERE id = $id");
		$row = mysqli_fetch_assoc($result);

		if($key === hash('sha256', $row['username']) )
		{
			$_SESSION['login'] = true; 
		}
		
	}

	if(isset($_SESSION["login"]) )
	{
		header("Location:index.php");
		exit;
	}


	if(isset($_POST["login"]) )
	{
		$username = $_POST["username"];
		$password = $_POST["password"];

		$result = mysqli_query($koneksi, "SELECT * FROM user WHERE username = '$username'");

		if(mysqli_num_rows($result) === 1)
		{
			$row = mysqli_fetch_assoc($result);

			if(password_verify($password, $row["password"]))
			{

				$_SESSION["login"] = true;

				if(isset($_POST['remember']) )
				{
					setcookie('id', $row['id'], time()+60);
					setcookie('key', hash('sha256', $row['username']), time()+60);

				}

				header("Location: index.php");
				exit;
			}
		}

		$error = true;
	}

 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<link rel="stylesheet" href="css/login.css">
</head>
<body>

	<?php 	if(isset($error) ) :?>
			<?php 
			echo '<script> alert("Maaf username atau password anda salah, silakan ulang kembali!!");</script>'; ?>
	<?php  endif; ?>

	<div class="container mt-5 bg-white box" style="width: 350px; height: 450px;">
		<h3>LOGIN</h3>
		<hr>
		<form action="" method="post">
			<table>	
				<tr>	
					<td><input type="text" name	= "username" placeholder="   Username" class="user form-control"></td>
				</tr>
				<tr>	
					<td><input type="password" name="password" placeholder="  Password" class="password user form-control"></td>
				</tr>
				<tr>

					<td>
						<input type="checkbox" onclick="myFunction()">Show Password
						<input type="checkbox"  name="remember">remember me
					</td>
				</tr>
				<tr>
					<td>
						<a href="registrasi.php" class="register">Register Account</a>	
					</td>
				</tr>
				<tr>
					<td> 	

							<button type="submit" name="login" class="tombol btn btn-primary"> Submit </button>
					</td>
				</tr>	
			</table>	
		</form>
	</div>
	<script src="js/login.js"></script>
</body>
</html>