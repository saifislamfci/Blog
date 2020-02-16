<?php include("inc/header.php"); ?>
<?php include("inc/siderbar.php"); ?>
<?php 
       $userid   =session::get('userid');
       $userrole =session::get('userRole');

?>
        <div class="grid_10">

            <div class="box round first grid">
                <h2>user profile</h2>
                <div class="block">  
                     <?php 
                if (isset($_POST['submit']) && $_POST['submit'] == "Update")
                 {
                $name       =mysqli_real_escape_string($db->link,$_POST['name']);
                $cat        =mysqli_real_escape_string($db->link,$_POST['username']);
                $email      =mysqli_real_escape_string($db->link,$_POST['email']);
                $body       =mysqli_real_escape_string($db->link,$_POST['body']);
                if (empty($name) || empty($email) || empty($body))
                 {
                    echo "All field requied";
                }
                else
                {
                $update="UPDATE db_user SET 
                                 name='$name',
                                email='$email',
                                details='$body' WHERE id= '$userid'";
                  $update=$db->update($update);              
                
               if ($update) 
               {
                   echo "Successfully updated";
               }
                else
                {
                    echo "Not updated";
                }
                } 
            }
                        ?>           
                 <form action="" method="post" enctype="multipart/form-data">
                    <table class="form">
            <?php 
            $select="SELECT * FROM db_user WHERE id ='$userid' AND role='$userrole' ";
            $selectquery=$db->select($select);
            if ($selectquery) {
                while ($result=$selectquery->fetch_assoc()) {
            ?>
                       
                        <tr>
                            <td>
                                <label>Name</label>
                            </td>
                            <td>
                                <input type="text" name="name" placeholder="Enter Post Title..." class="medium" />
                            </td>
                        </tr>
                       
                        <tr>
                            <td>
                                <label>username</label>
                            </td>
                            <td>
                                <input type="text" name="username" value="<?php echo $result['username'];?>" class="medium" readonly />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>email</label>
                            </td>
                            <td>
                                <input type="text" name="email" placeholder="Enter Post Title..." class="medium" />
                            </td>
                        </tr>
                                                <tr>
                            <td>
                                <label>role</label>
                            </td>
                            <td>
                                <input type="text" name="role" value="<?php  if($result['role'] == 0){echo "admin";}elseif($result['role'] == 1){echo "author";} else{ echo "editor";}?>" placeholder="Enter Post Title..." class="medium" readonly />
                            </td>
                        </tr>

                        <tr>
                            <td style="vertical-align: top; padding-top: 9px;">
                                <label>Content</label>
                            </td>
                            <td>
                                <textarea class="tinymce" name="body"></textarea>
                            </td>
                        </tr>
                    
                        <tr>
                            <td></td>
                            <td>
                                <input type="submit" name="submit" Value="Update" />
                            </td>
                        </tr>
                        <?php }}?>
                    </table>

                    </form>
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