
<?php include("inc/header.php"); ?>
<?php include("inc/siderbar.php"); ?>
         <?php
                if(!isset($_GET['catid'] )|| $_GET['catid']== Null)
                {
                    echo "<script>window.location='catlist.php';</script";
                }
                else
                {
                   $catid=$_GET['catid'];
                }
                ?>
        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>Add New Category</h2>
               <div class="block copyblock">
                <?php
                if(isset($_POST['name']))
                {
                $name=$_POST['name'];
                $name=mysqli_real_escape_string($db->link,$name);
                if(empty($name))
                {
                    echo "plz include data";
                }
                else
                {
                    $update="UPDATE db_categories 
                            SET name='$name'
                            WHERE id='$catid'";
                    $updatedata=$db->update($update);
                    if ($updatedata) {
                        echo " data update successfull";
                    }
                    else
                    {
                        echo "some thing problem";
                    }
                }
                }
                ?>
                <?php
                
                   if($catid)
                   {
                    $query="SELECT * FROM db_categories WHERE id='$catid' order by id desc";
                    $selectquery=$db->select($query);
                    while ($result=$selectquery->fetch_assoc()) { 
                ?>

                 <form action="" method="post">

                    <table class="form">					
                        <tr>
                            <td>
                                <input type="text" name="name" value="<?php echo $result['name'];?>" class="medium" />
                            </td>
                        </tr>
						<tr> 
                            <td>
                                <input type="submit" name="submit" Value="Save" />
                            </td>
                        </tr>
                    </table>
                    </form>
                <?php } }?>
                </div>
            </div>
        </div>
        <div class="clear">
        </div>
    </div>
    <script src="js/table/jquery.dataTables.min.js" type="text/javascript"></script>
 
