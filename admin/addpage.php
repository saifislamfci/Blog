<?php include("inc/header.php"); ?>
<?php include("inc/siderbar.php"); ?>
        <div class="grid_10">

            <div class="box round first grid">
                <h2>Add New Post</h2>
                <div class="block">               
                 <form action="" method="post" enctype="multipart/form-data">
                    <table class="form">
            <?php
            if (isset($_POST['submit']) && $_POST['submit'] == "Save")
            {
                $page          =mysqli_real_escape_string($db->link,$_POST['page']);
                $content       =mysqli_real_escape_string($db->link,$_POST['Content']);
                if ($page == '' || $content == '')
                 {
                 echo "All filed Empty";
                 }
                else
                 {
                  $insertquery="INSERT INTO pages(page,content) VALUES ('$page','$content')";
                  $insert=$db->insert($insertquery);
                  if ($insert) {
                    echo "Insert successful";
                  }
                  else
                  {
                    echo "Insert Not successful";
                  }
                 }
            }
            ?>
                       
                        <tr>
                            <td>
                                <label>Page Name</label>
                            </td>
                            <td>
                                <input type="text" name="page" placeholder="Enter Page NAME..." class="medium" />
                            </td>
                        </tr>
                   
                        <tr>
                            <td style="vertical-align: top; padding-top: 9px;">
                                <label>Content</label>
                            </td>
                            <td>
                                <textarea class="tinymce" name="Content"></textarea>
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