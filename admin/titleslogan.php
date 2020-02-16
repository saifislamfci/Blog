<?php include("inc/header.php"); ?>
<?php include("inc/siderbar.php"); ?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Update Site Title and Description</h2>
                <div class="block sloginblock">               
                 <form action="uplogo.php" method="post" enctype="multipart/form-data">
                <?php
                $selectquery="SELECT * FROM  title_slogan";
                $query=$db->select($selectquery);
                if($query)
                {
                    while ($result=$query->fetch_assoc()) {
                        
                ?>
                <table class="form">
                
                        <tr>

                            <td>
                                <label>Logo</label>
                            </td>

                            <td> 
                               <input type="file" name="image" />
                            </td>
                            <td>

                                <img src="upload/<?php echo $result['logo']; ?>" height="100px" width="80px">
                            </br>
                                <p> current image</p>
                            </td>
                        </tr>					
                        <tr>
                            <td>
                                <label>Website Title</label>
                            </td>
                            <td>
                                <input type="text" value="<?php echo $result['title'];?>" name="title" class="medium" />
                            </td>
                        </tr>
						 <tr>
                            <td>
                                <label>Website Slogan</label>
                            </td>
                            <td>
                                <input type="text" value="<?php echo $result['slogan'];?>" name="slogan" class="medium" />
                            </td>
                        </tr>
						 
						
						 <tr>
                            <td>
                            </td>
                            <td>
                                <input type="submit" name="submit" Value="Update" />
                            </td>
                        </tr>
                    </table>
                <?php }} ?>
                    </form>
                </div>
            </div>
        </div>
<?php include("inc/footer.php"); ?>
