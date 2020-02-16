
<?php include("inc/header.php"); ?>
<?php include("inc/siderbar.php"); ?>

        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>Add New Category</h2>
               <div class="block copyblock"> 
                <?php
                if(isset($_POST['submit']) && $_POST['submit'] == "Save")
                {
                $addcat=$_POST['name'];
                if(empty($addcat))
                {
                    echo "add catagory";
                }
                else
                   {
                    $query="INSERT INTO db_categories(name) VALUES ('$addcat')";
                   $query=$db->insert($query);
                    echo "<span class='slider_success'>success</span>";
                   }
               }

                ?>
                 <form action="addcat.php" method="post">

                    <table class="form">					
                        <tr>
                            <td>
                                <input type="text" name="name" placeholder="Enter Category Name..." class="medium" />
                            </td>
                        </tr>
						<tr> 
                            <td>
                                <input type="submit" name="submit" Value="Save" />
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
