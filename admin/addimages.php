<?php include("inc/header.php"); ?>
<?php include("inc/siderbar.php"); ?>
        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>Add User</h2>
               <div class="block copyblock"> 
                    <?php
                if(isset($_POST['submit']) && $_POST['submit'] == "Add")
                {
                    $title      =mysqli_real_escape_string($db->link,$_POST['title']);
                    //image
                    $permited  = array('jpg', 'jpeg', 'png', 'gif');
                    $file_name = $_FILES['image']['name'];
                    $file_size = $_FILES['image']['size'];
                    $file_temp = $_FILES['image']['tmp_name'];

                    $div = explode('.', $file_name);
                    $file_ext = strtolower(end($div));
                    $unique_image = rand(1000,9999).'.'.$file_ext;
                    $uploaded_image = "upload/".$unique_image;
                    if (empty($file_name) || empty($title)) 
                    {
                     echo "You are not select Image";
                    }
                    else
                    {
                     if($file_size > 1048567)
                        {
                         echo "photo  upload 3 MB";
                        }
                        else if (in_array($file_ext, $permited) === false)
                         {
                            echo "Plz select image type";
                         }
                         else
                         {
                           move_uploaded_file($file_temp, $uploaded_image);
                           $Insertquery="INSERT INTO slider(title,image) Values('$title','$unique_image')";
                           $updatedata=$db->insert($Insertquery);
                        if ($updatedata) 
                        {
                         echo "insert data";
                        }
                        else
                        {
                          echo "can't data";
                        }
                    }

              }
              
             }
                     ?>
                 <form action="" method="post" enctype="multipart/form-data">
                    <table class="form">
                        <tr>
                            <td>Title</td>
                            <td>
                                <input type="text" name="title"  class="medium" />
                            </td>
                        </tr>					
                        <tr>
                            <td>Image</td>
                            <td>
                                <input type="file" name="image"  class="medium" />
                            </td>
                        </tr>
                         <tr>
                            <td>
                                <input type="submit" name="submit" Value="Add" />
                            </td>
                        </tr>
                    </table>
                    </form>
                </div>
            </div>
        </div>
        <div class="clear">
        </div>
    </div>
    <script src="js/table/jquery.dataTables.min.js" type="text/javascript"></script>
 <?php include("inc/footer.php"); ?>
