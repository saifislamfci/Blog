<?php include("inc/header.php"); ?>
<?php include("inc/siderbar.php"); ?>
    <div class="grid_10">
        <div class="box round first grid">
         <h2>View Message</h2>
            <div class="block"> 
        <?php
            if (!isset($_GET['msgid']) || $_GET['msgid'] == "NULL")
            { 
              echo "<script>window.location='inbox.php';</script";
            }
            else
            {
             $id=$_GET['msgid'];
            }

        ?>
        <?php 
            if (isset($_POST['submit']) && $_POST['submit']== 'Ok')
             {
              echo "<script>window.location='inbox.php';</script";
             }

            ?>             
            <form action="" method="post" enctype="multipart/form-data">
              <table class="form">
                <?php
                $selectquery="SELECT * FROM   contect_us Where id='$id' ORDER By id DESC";
                $query=$db->select($selectquery);
                if($query)
                {
                    while ($result=$query->fetch_assoc()) {        
                ?>
                        <tr>
                            <td>
                                <label>Serial No:</label>
                            </td>
                            <td>
                                <input type="text" readonly value="<?php echo $result['id']; ?>" class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Name</label>
                            </td>
                            <td>
                                <input type="text" readonly value="<?php echo $result['fname'].' '.$result['lname']; ?>" class="medium" />
                            </td>
                        </tr>
                                                <tr>
                            <td>
                                <label>Email</label>
                            </td>
                            <td>
                                <input type="text" readonly value="<?php echo $result['email']; ?>" class="medium" />
                            </td>
                        </tr>


                        <tr>
                            <td style="vertical-align: top; padding-top: 9px;">
                                <label>Message</label>
                            </td>
                            <td>
                                <textarea rows="10" cols="75" name="body" readonly><?php echo $result['body']; ?>"</textarea>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>date</label>
                            </td>
                            <td>
                                <input type="text" class="medium" value="<?php echo $result['date']; ?>" readonly />
                            </td>
                        </tr>

                        <tr>
                            <td></td>
                            <td>
                                <input type="submit" name="submit" Value="Ok" />
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