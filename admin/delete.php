<?php
include("../lib/session.php");
session::checksession();
?>

<?php include("../lib/Database.php");?>
<?php include("../config/config.php");?>
<?php include("../helpers/format.php");?>
<?php
$db=new Database;
?>

<?php
if (!isset($_GET['delid']) OR $_GET['delid'] == NULL) 
{
	echo "<script>window.location='postlist.php';</script>";
}
else
{
	$id=$_GET['delid'];
	$selectquery="select * FROM db WHERE id='$id'";
	$selectquery=$db->select($selectquery);
	if ($selectquery) {
		while ($result=$selectquery->fetch_assoc()) {
			$dellink=$result['image'];
			unlink("../admin/upload/".$dellink);
		}
	}
	$delquery="DELETE FROM db WHERE id='$id' ";
	$delquery=$db->delete($delquery);
	if ($delquery) {
		echo " Delete successful ";
		echo "<br>";
		echo "<button><a href='postlist.php'>go Back</a></button>";

	}
	else
	{
		echo "No Delete";
	}
}

?>