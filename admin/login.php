<?php 
include("../lib/session.php");
session::init();
?>
<?php include("../lib/Database.php");?>
<?php include("../config/config.php");?>
<?php include("../helpers/format.php");?>

<?php
$fm=new format;
$db=new Database;
?>
<!DOCTYPE html>
<head>
<meta charset="utf-8">
<title>Login</title>
    <link rel="stylesheet" type="text/css" href="css/stylelogin.css" media="screen" />
</head>
<body>
<div class="container">
	<section id="content">
		<?php
		if($_SERVER['REQUEST_METHOD'] == 'POST')
		{
			$username=$_POST['username'];
			$password=$_POST['password'];
			

			$username=$fm->validate($username);
			$password=$fm->validate(md5($password));

			$username=mysqli_real_escape_string($db->link,$username);
			$password=mysqli_real_escape_string($db->link,$password);

			$query="SELECT * FROM db_user WHERE username='$username' AND password='$password'";
			$result=$db->select($query);
			if($result != false)
			{
				//$value=mysqli_fetch_array($result);
				$value=$result->fetch_assoc();
					session::set("login",true);
					session::set("username", $value['username']);
					session::set("userid", $value['id']);
					session::set("userRole", $value['role']);
					header("Location:index.php");
				}
				
			
			else{

				echo "username and password not match";
			}
		}


		?>
		<form action="login.php" method="post">
			<h1>Admin Login</h1>
			<div>
				<input type="text" placeholder="Username" required="" name="username"/>
			</div>
			<div>
				<input type="password" placeholder="Password" required="" name="password"/>
			</div>
			<div>
				<input type="submit" value="Log in" />
			</div>
		</form><!-- form -->
		<div class="button">
			<a href="forget.php">Forget Password</a>
		</div><!-- button -->
	</section><!-- content -->
</div><!-- container -->
</body>
</html>