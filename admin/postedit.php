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
                <h2>Add New Post</h2>
                <div class="block"> 
                <?php
                $selectquery="SELECT * FROM db WHERE id='$postid' order by id desc";
                $query=$db->select($selectquery);
                if($query)
                {
                	while ($post=$query->fetch_assoc()) {
                		# code...

                 ?>             
                 <form action="" method="post" enctype="multipart/form-data">
                    <table class="form">
            <?php
            if (isset($_POST['submit']) && $_POST['submit'] == "Save")
            {
                $title      =mysqli_real_escape_string($db->link,$_POST['title']);
                $cat        =mysqli_real_escape_string($db->link,$_POST['cat']);
                $body       =mysqli_real_escape_string($db->link,$_POST['body']);
                $tags       =mysqli_real_escape_string($db->link,$_POST['tags']);
                $autor      =mysqli_real_escape_string($db->link,$_POST['autor']);
                $hidden      =mysqli_real_escape_string($db->link,$_POST['hidden']);
                $errors     =[];

                //image
                    $permited  = array('jpg', 'jpeg', 'png', 'gif');
                    $file_name = $_FILES['image']['name'];
                    $file_size = $_FILES['image']['size'];
                    $file_temp = $_FILES['image']['tmp_name'];

                    $div = explode('.', $file_name);
                    $file_ext = strtolower(end($div));
                    $unique_image = rand(1000,9999).'.'.$file_ext;
                    $uploaded_image = "upload/".$unique_image;
               if (isset($title,$cat,$body,$tags,$autor,$hidden))
            	{
            		 $updatequery="UPDATE db SET
                     cat='$cat',
                     title='$title',
                     body='$body',
                     autor='$autor',
                     tags='$tags',
                     user_roles='$hidden'
                     where id='$postid' ";
                     $updatedata=$db->update($updatequery);
                     if ($updatedata) 
                     {
                         echo "Update data wihout pic";
                     }
                     else
                     {
                        echo "can't update data";
                     }
            	}
            }
            else {
            	if (isset($title,$cat,$body,$tags,$autor,$file_name))
            {		
                if (empty($title) && empty($cat) && empty($body) && empty($tags) && empty($autor) )
                 {
                    echo "all field empty";
                 }
                else { 
                  if(empty($title))
                 {
                    $errors[] = "Title is empty";
                 }
                if (empty($body)) {
                     $errors[] =  "Body is empty";
                 }
                if(empty($cat))
                 {
                    $errors[] =  " Autor is empty";
                 }
                  if(empty($tags))
                 {
                    $errors[] = "Tags is empty";
                 }
                  if(empty($autor))
                 {
                    $errors[] =  " Autor is empty";
                 }
                 if(empty($file_name))
                 {
                    $errors[] =  "File name empty";
                 }
                 else if($file_size > 1048567)
                 {
                    $errors[]="photo  upload 3 MB";
                 }
                 elseif (in_array($file_ext, $permited) === false) {
                     $errors= "Plz select image type";
                 }

                    }
                if (!empty($errors)) 
                {
                foreach ($errors as $key => $value) 
                {
                    echo $value;
                    echo "<br>";
                }
            }
                else
                {
                     move_uploaded_file($file_temp, $uploaded_image);
                     $updatequery="UPDATE db SET
                     cat='$cat',
                     title='$title',
                     body='$body',
                     image='$unique_image',
                     autor='$autor',
                     tags='$tags',
                     user_roles='$hidden'
                     where id='$postid' ";
                     $updatedata=$db->update($updatequery);
                     if ($updatedata) 
                     {
                         echo "Update data";
                     }
                     else
                     {
                        echo "can't update data";
                     }
                }
            }
        }
            ?>
                       
                        <tr>
                            <td>
                                <label>Title</label>
                            </td>
                            <td>
                                <input type="text" name="title" value="<?php echo $post['title']; ?>" class="medium" />
                            </td>
                        </tr>

                     
                        <tr>
                            <td>
                                <label>Category</label>
                            </td>
                            <td>
                                <select id="select" name="cat">
									 <option value="">Select One</option>
                                    <?php
                                    $querys="SELECT * FROM db_categories";
                                    $dbquery=$db->select($querys);
                                    if ($dbquery) {
                                        while($result=$dbquery->fetch_assoc())
                                        {
                                    ?>
                                    <option 
								<?php
								if($post['cat'] == $result['id'])
								{
									?>
									 selected = "selected";
								<?php }?>
								 
                                    value="<?php echo $result['id'];?>"><?php echo $result['name'];?></option>
                                    <?php }}?>
                                </select>
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
                            <td style="vertical-align: top; padding-top: 9px;">
                                <label>Content</label>
                            </td>
                            <td>
                                <textarea class="tinymce" name="body"> <?php  echo $post['body'];?></textarea>
                            </td>
                        </tr>
                                                <tr>
                            <td>
                                <label>TAGS</label>
                            </td>
                            <td>
                                <input type="text" name="tags" value="<?php echo $post['tags'];?>" class="medium" />
                            </td>
                        </tr>
                                                <tr>
                            <td>
                                <label>AUTOR</label>
                            </td>
                            <td>
                                <input type="text" name="autor" value="<?php echo $post['autor']; ?>" class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label></label>
                            </td>
                          <td>
                                <input type="hidden" name="hidden" value="<?php echo session::get('userid'); ?>" class="medium" />
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