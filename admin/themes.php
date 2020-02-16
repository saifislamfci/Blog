<?php include("inc/header.php"); ?>
<?php include("inc/siderbar.php"); ?>
        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>Add New Category</h2>
               <div class="block copyblock">
                <?php
                if(isset($_POST['submit']))
                {
                $name=$_POST['name'];
                $name=mysqli_real_escape_string($db->link,$name);
                    $update="UPDATE tbl_theme
                            SET theme='$name'
                            WHERE id= '1' ";
                    $updatedata=$db->update($update);
                    if ($updatedata) {
                        echo " Theme update successfull";
                    }
                    else
                    {
                        echo "Theme not updated";
                    }
                }
                
                ?>
                <?php
                  $query="SELECT * FROM tbl_theme" ;
                     $selectquery=$db->select($query);
                    while ($result=$selectquery->fetch_assoc()) { 
                ?>

                 <form action="" method="post">

                    <table class="form">					
                        <tr>
                            <td>
                                <input <?php if ($result['theme']== "default") {echo "checked"; }?> type="radio" name="name" value="default" />default
                            </td>
                        </tr>
                                                <tr>
                            <td>
                                <input  <?php if ($result['theme']== "green") {echo "checked"; }?> type="radio" name="name" value="green" />green
                            </td>
                        </tr>
                                                <tr>
                            <td>
                                <input  <?php if ($result['theme']== "red") {echo "checked"; }?> type="radio" name="name" value="red" />red
                            </td>
                        </tr>
						<tr> 
                            <td>
                                <input type="submit" name="submit" Value="Change" />
                            </td>
                        </tr>
                    </table>
                    </form>
                <?php }?>
                </div>
            </div>
        </div>
        <div class="clear">
        </div>
    </div>
    <script src="js/table/jquery.dataTables.min.js" type="text/javascript"></script>
 
