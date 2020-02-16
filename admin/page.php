<?php include("inc/header.php"); ?>
<?php include("inc/siderbar.php"); ?>
        <div class="grid_10">

            <div class="box round first grid">
                <h2>Add New Post</h2>
                <div class="block">               
                <form action="" method="post" enctype="multipart/form-data">
                    <table class="form">
            <?php
            if (isset($_POST['submit']) && $_POST['submit'] == "Update")
            {
                $page          =mysqli_real_escape_string($db->link,$_POST['page']);
                $content       =mysqli_real_escape_string($db->link,$_POST['Content']);
                if ($page == '' || $content == '')
                 {
                 echo "All filed Empty";
                 }
                else
                 {
                  $id =$_GET['pageid'];
                  $updatequery="UPDATE pages SET 
                                page='$page',
                                content='$content'
                                WHERE id='$id'
                                ";
                  $update=$db->update($updatequery);
                  if ($update) {
                    echo "Update successful";
                  }
                  else
                  {
                    echo "Update  Not successful";
                  }
                 }
            }
            ?>
            <?php 
                        $id =$_GET['pageid'];
                        $Cat="SELECT * FROM pages Where id= '$id'";
                        $query=$db->select($Cat);
                        if($query)
                        {
                            while($result=$query->fetch_assoc())
                            {
            ?>
                          <tr>
                            <td>
                                <label>Page Name</label>
                            </td>
                            <td>
                                <input type="text" name="page" value="<?php echo $result['page']?>" class="medium" />
                            </td>
                        </tr>
                   
                        <tr>
                            <td style="vertical-align: top; padding-top: 9px;">
                                <label>Content</label>
                            </td>
                            <td>
                                <textarea class="tinymce" name="Content">value="<?php echo $result['content']?>"</textarea>
                            </td>
                        </tr>
 

                        <tr>
                            <td></td>
                            <td>
                                <input type="submit" name="submit" Value="Update" />
                                <button><a onclick="return confirm('Are you sure DELETE this');" href="deletepage.php?delid=<?php echo $result['id'];?>">DELETE</a></button>
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