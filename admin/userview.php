<?php include("inc/header.php"); ?>
<?php include("inc/siderbar.php"); ?>
    <div class="grid_10">
        <div class="box round first grid">
                <h2>user profile</h2>
                <div class="block">  
            <?php 
                if (isset($_POST['submit']) && $_POST['submit'] == "ok")
                  {
                    echo "<script>window.location='userlist.php';</script>";
                  }
            
             ?>           
           <form action="" method="post" enctype="multipart/form-data">
            <table class="form">
            <?php 
            $id=$_GET['edit'];
            $select="SELECT * FROM  db_user WHERE id='$id'";
            $selectquery=$db->select($select);
            if ($selectquery) {
                while ($result=$selectquery->fetch_assoc()) {
            ?>
                       
                        <tr>
                            <td>
                                <label>Name</label>
                            </td>
                            <td>
                                <input type="text" readonly value="<?php echo $result['name'];?>" class="medium" />
                            </td>
                        </tr>
                       
                        <tr>
                            <td>
                                <label>username</label>
                            </td>
                            <td>
                                <input type="text" readonly value="<?php echo $result['username'];?>" class="medium" readonly />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>email</label>
                            </td>
                            <td>
                                <input type="text" name="email" readonly value="<?php  echo $result['email'];?>" class="medium" />
                            </td>
                        </tr>
                                                <tr>
                            <td>
                                <label>role</label>
                            </td>
                            <td>
                                <input type="text" name="role" readonly value="<?php  if($result['role'] == 0){echo "admin";}elseif($result['role'] == 1){echo "author";} else{ echo "editor";}?>" placeholder="Enter Post Title..." class="medium" readonly />
                            </td>
                        </tr>

                        <tr>
                            <td style="vertical-align: top; padding-top: 9px;">
                                <label>Content</label>
                            </td>
                            <td>
                                <textarea class="tinymce" name="body" readonly><?php echo $result['details'];?></textarea>
                            </td>
                        </tr>
                    
                        <tr>
                            <td></td>
                            <td>
                                <input type="submit" name="submit" Value="ok" />
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