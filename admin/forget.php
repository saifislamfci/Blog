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
<title>Password Recovery</title>
    <link rel="stylesheet" type="text/css" href="css/stylelogin.css" media="screen" />
</head>
<body>
<div class="container">
	<section id="content">
		<?php
		if($_SERVER['REQUEST_METHOD'] == 'POST')
		{
			$gmail=$_POST['gmail'];
			$gmail=$fm->validate($gmail);
			$gmail=mysqli_real_escape_string($db->link,$gmail);


			if (!filter_var($gmail, FILTER_VALIDATE_EMAIL)) 
			{
				echo "Invalid Email";
			}
			else{


			$mailquery= "SELECT * FROM db_user WHERE email='$gmail' limit 1";
			$result=$db->select($mailquery);
			if ($result != false) 
			{
				while ($value=$result->fetch_assoc())
				{
					$userid  =$value['id'];
					$username=$value['username'];
					
				}
				$text=substr($gmail, 0,4);
				$rand=rand(1000,9999);
				$pass="$text$rand";
				$realpass=md5($pass);

                $updatequery="UPDATE db_user SET 
                                password='$realpass'
                                WHERE id='$userid'";
                $update=$db->update($updatequery);
                $to="$gmail";
                $headers="from:www.saifulfci.com";
                $subject="As new password";
                $message="your username is".$username."And your password is".$pass;

                $mail=mail($to, $subject, $message,$headers);
                if ($mail)
                 {
                	echo "Your messege sent successful";
                 }
                 else
                 {
                 	echo "Your password Not sent";
                 }



			}
			else{
				echo "Mail Not exits";
			}
			}
		}
		?>
		<form action="" method="post">
			<h1>Password Recovery</h1>
			<div>
				<input type="text" placeholder="gmail only" required="" name="gmail"/>
			</div>
			<div>
				<input type="submit" value="Send mail" />
			</div>
		</form><!-- form -->
		<div class="button">
			<a href="login.php">log in</a>
		</div><!-- button -->
	</section><!-- content -->
</div><!-- container -->
</body>
</html>