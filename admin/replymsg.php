<?php include("inc/header.php"); ?>
<?php include("inc/siderbar.php"); ?>
        <div class="grid_10">

            <div class="box round first grid">
                <h2>View Message</h2>
                <div class="block"> 
            <?php
            if (!isset($_GET['replyid']) || $_GET['replyid'] == "NULL")
            { 
              echo "<script>window.location='inbox.php';</script";
            }
            else
            {
             $id=$_GET['replyid'];
            }

            ?>
        <?php 

            if (isset($_POST['submit']) && $_POST['submit']== 'Send')
             {
              $toemail   =$_POST['toemail'];
              $fromemail =$_POST['fromemail'];
              $sub       =$_POST['subject'];
              $body      =$_POST['body'];
              
              $sendmail  =mail($toemail, $sub, $body, $fromemail);
              if ($sendmail) 
              {
                  echo "successful";
              }
             else
                {
                 echo "Not send";
                }
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
                                <label>TO</label>
                            </td>
                            <td>
                                <input type="text" name="toemail" readonly value="<?php echo $result['email']; ?>" class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>From</label>
                            </td>
                            <td>
                                <input type="email" name="fromemail" class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Subject</label>
                            </td>
                            <td>
                                <input type="text" name="subject" class="medium" />
                            </td>
                        </tr>


                        <tr>
                            <td style="vertical-align: top; padding-top: 9px;">
                                <label>Answer</label>
                            </td>
                            <td>
                                <textarea class="tinymce" name="body"></textarea>
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>
                                <input type="submit" name="submit" Value="Send" />
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