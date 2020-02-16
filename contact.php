<?php include("inc/header.php");?>
	<div class="contentsection contemplete clear">
		<div class="maincontent clear">
<?php 
if (isset($_POST['submit']))
{
	$fname=$fm->validate($_POST['firstname']);
	$lname=$fm->validate($_POST['lastname']);
	$email=$fm->validate($_POST['email']);
	$body=$fm->validate($_POST['body']);

	//mysql
	$fname =mysqli_real_escape_string($db->link,$fname);
	$lname =mysqli_real_escape_string($db->link,$lname);
	$email =mysqli_real_escape_string($db->link,$email);
	$body =mysqli_real_escape_string($db->link,$body);
	if (isset($fname,$lname,$email))
	 {
		if (empty($fname) && empty($lname) && empty($email) && empty($body)) {
			echo "All field is empty";
		}
		elseif (empty($fname)) {
			echo " first Name is empty";
		}
		else if (!filter_var($fname,FILTER_SANITIZE_SPECIAL_CHARS))
		{
			echo "invalid first Name";
		}

		else if(empty($lname))
		{
			echo "Last Name is empty";
		}
		else if (empty($email)) {
			echo "Email is empty";
		}
		else if (!filter_var($email,FILTER_VALIDATE_EMAIL))
		{
			echo "invalid email";
		}
		else if (empty($body)) {
			echo "Body is empty";
		}
		else
		{
			$insertquery="INSERT INTO contect_us(fname,lname,email,body)Values('$fname','$lname','$email','$body')";
			$insert=$db->insert($insertquery);
			if ($insert) {
				echo "successful Insert";
					}
			else
				{
				echo "Not Insert";
				}
		}
	 }
	}
	?>


		<div class="about">
				<h2>Contact us</h2>
			<form action="" method="post">
				<table>
					<tr>
						<td>Your First Name:</td>
					<td>
						<input type="text" name="firstname" placeholder="Enter first name"/>
					</td>
					</tr>
				<tr>
					<td>Your Last Name:</td>
					<td>
					   <input type="text" name="lastname" placeholder="Enter Last name"/>
					</td>
				</tr>
				
				<tr>
					<td>Your Email Address:</td>
					<td>
					   <input type="text" name="email" placeholder="Enter Email Address"/>
					</td>
				</tr>
				<tr>
					<td>Your Message:</td>
					<td>
					   <textarea name="body"></textarea>
					</td>
				</tr>
				<tr>
					<td></td>
					<td>
					   <input type="submit" name="submit" value="Submit"/>
					</td>
				</tr>
				</table>
		    <form>				
     </div>

	</div>
<?php include("inc/slidebar.php");?>
	</div>

<?php include("inc/footer.php");?>
<?php include("inc/copyright.php");?>