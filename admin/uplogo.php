<?php include("../lib/Database.php");?>
<?php include("../config/config.php");?>
<?php include("../helpers/format.php");?>
<?php
$fm=new format;
$db=new Database 
?>
<?php
if (isset($_POST['submit']) && $_POST['submit'] == 'Update' )
 {
	$title=$_POST['title'];
	$des  = $_POST['slogan'];
	//image

          $permited  = array('jpg', 'jpeg', 'png', 'gif');
          $file_name = $_FILES['image']['name'];
          $file_size = $_FILES['image']['size'];
          $file_temp = $_FILES['image']['tmp_name'];

          $div = explode('.', $file_name);
          $file_ext = strtolower(end($div));
          $unique_image = rand(1000,9999).'.'.$file_ext;
          $uploaded_image = "upload/".$unique_image;
          if(isset($title,$des,$file_name))
          { 
              move_uploaded_file($file_temp, $uploaded_image);
          	 $updatequery="UPDATE  title_slogan
          					SET title='$title',slogan='$des', logo='$unique_image' WHERE id='1' ";
          	$update=$db->update($updatequery);
          	if ($update) {
          		echo "success";
          	}
        }
        else
        {
        	if(isset($title,$des))
        	{
        	 $updatequery="UPDATE  title_slogan
          					SET title='$title',slogan='$des' WHERE id='1' ";
          	$update=$db->update($updatequery);
          	if ($update) {
          		echo "success";
          	}	
        	}
        	else
        	{
        		echo "some thing wrong";
        	}
        }
}

?>