<?php include("inc/header.php"); ?>
<?php include("inc/siderbar.php"); ?>
        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>Update Social Media</h2>
                <div class="block">
            <?php
            if (isset($_POST['submit']) && $_POST['submit'] == 'Update' ) 
            {
               $fb=$fm->validate($_POST['facebook']);
               $tw=$fm->validate($_POST['twitter']);
               $ln=$fm->validate($_POST['linkedin']);
               $gg=$fm->validate($_POST['googleplus']);
               //mysql
               $fb =mysqli_real_escape_string($db->link,$fb);
               $tw =mysqli_real_escape_string($db->link,$tw);
               $ln =mysqli_real_escape_string($db->link,$ln);
               $gg =mysqli_real_escape_string($db->link,$gg);
               if($fb || $tw || $ln || $gg)
               {
                $updatequery="UPDATE social SET 
                                fb='$fb',
                                tw='$tw',
                                ln='$ln',
                                gg='$gg'  WHERE id= '1' ";
                $update=$db->update($updatequery);
                if ($update) 
                {
                         echo "successful update";
                }     
                } 
            }


                     
  
                            
            ?>            
        <form action="" method="post">
            <?php 
            $selectquery="SELECT * FROM social WHERE id='1' ";
            $select=$db->select($selectquery);
           
                 while ($result=$select->fetch_assoc()) {
                    ?>
                    <table class="form">					
                        <tr>
                            <td>
                                <label>Facebook</label>
                            </td>
                            <td>
                                <input type="text" name="facebook" value="<?php echo $result['fb'];?>" class="medium" />
                            </td>
                        </tr>
						 <tr>
                            <td>
                                <label>Twitter</label>
                            </td>
                            <td>
                                <input type="text" name="twitter" value="<?php echo $result['tw'];?>" class="medium" />
                            </td>
                        </tr>
						
						 <tr>
                            <td>
                                <label>LinkedIn</label>
                            </td>
                            <td>
                                <input type="text" name="linkedin" value="<?php echo $result['ln'];?>" class="medium" />
                            </td>
                        </tr>
						
						 <tr>
                            <td>
                                <label>Google Plus</label>
                            </td>
                            <td>
                                <input type="text" name="googleplus" value="<?php echo $result['gg'];?>" class="medium" />
                            </td>
                        </tr>
						
						 <tr>
                            <td></td>
                            <td>
                                <input type="submit" name="submit" Value="Update" />
                            </td>
                        </tr>
                    </table>
                    <?php } ?>
                    </form>
                
                </div>
            </div>
        </div>
<?php include("inc/footer.php"); ?>