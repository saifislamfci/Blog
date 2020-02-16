<?php include("../lib/Database.php");?>
<?php include("../config/config.php");?>
<?php include("../helpers/format.php");?>
<?php
$db=new Database;
?>

<?php 
if (isset($_GET['delid']) && $_GET['delid'] ==NULL ) {
	 echo "<script>window.location='index.php';</script";
}
else
{
	$id=$_GET['delid'];
	$delquery="DELETE FROM pages WHERE id='$id'";
                	$delquery=$db->delete($delquery);
                	if($delquery)
                	{
                		echo "<script>alert('Page Delete Successful');</script>";
                		header("Location:index.php");
                	}
                	else
                	{
                		echo "something worng";
                	}
}

?>