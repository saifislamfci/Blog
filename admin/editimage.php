<?php include("inc/header.php"); ?>
<?php include("inc/siderbar.php"); ?>
<?php 
if (!isset($_GET['edit']) || $_GET['edit']==NULL  ) {
	echo "<script>window.location='postlist.php';</script>";
}
else
{
	$postid=$_GET['edit'];
}


?>
            <div class="grid_10">

            <div class="box round first grid">
                <h2>Edit Image</h2>
                <div class="block"> 
                <?php
                $selectquery="SELECT * FROM slider WHERE id='$postid'";
                $query=$db->select($selectquery);
                if($query)
                {
                	while ($post=$query->fetch_assoc())
                    {  		# code...
                	$image=$post['image'];
                    echo $image;

                 ?>             
     <form action="" method="post" enctype="multipart/form-data">
                    <table class="form">
            <?php
            if (isset($_POST['submit']) && $_POST['submit'] == "Save")
            {
                $title      =mysqli_real_escape_string($db->link,$_POST['title']);
               

                //i<mage
       
                    $permited  = array('jpg', 'jpeg', 'png', 'gif');
                    $file_name = $_FILES['image']['name'];
                    $file_size = $_FILES['image']['size'];
                    $file_temp = $_FILES['image']['tmp_name'];

                    $div = explode('.', $file_name);
                    $file_ext = strtolower(end($div));
                    $unique_image = rand(1000,9999).'.'.$file_ext;
                    $uploaded_image = "upload/".$unique_image;

                    if (isset($file_name)) 
                    {
                    move_uploaded_file($file_temp, $uploaded_image);
                     $updatequery="UPDATE slider SET
                     title='$title',
                     image='$unique_image'
                     where id='$postid'";
                     $updatedata=$db->update($updatequery);
                     if ($updatedata) {
                          echo "Successful Update.";
                         
                       }  
                    }
                }
         ?>
                        <tr>
                            <td>
                                <label>Title</label>
                            </td>
                            <td>
                            <input type="text" name="title" value="<?php echo $post['title'];?>">
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <label>Upload Image</label>
                            </td>
                            <td>
                            	<img src="upload/<?php echo $post['image'];?>" height="50px" width="100px">
                            	<br>
                                <input type="file" name="image" />
                            </td>
                        </tr>   
                        <tr>
                            <td></td>
                            <td>
                                <input type="submit" name="submit" Value="Save" />
                            </td>
                        </tr>
                    </table>
                    </form>
                <?php }}?>
                </div>
            </div>
        </div>
    <script src="js/tiny-mce/jquery.tinymce.js" type="text/javascript"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            setupTinyMCE();
            setDatePicker('date-picker');
            $('input[type="checkbox"]').fancybutton();
            $('input[type="radio"]').fancybutton();
        });
    </script>
<?php include("inc/footer.php"); ?>