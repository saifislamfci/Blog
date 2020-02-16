
<?php include("inc/header.php"); ?>
<?php include("inc/siderbar.php"); ?>
     <?php if (!session::get('userRole') == '0') { 
                    echo "<script>window.location='index.php';</script>";
    }?>

        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>Add User</h2>
               <div class="block copyblock"> 
                <?php
                if(isset($_POST['submit']) && $_POST['submit'] == "create")
                {
                $username=$fm->validate($_POST['username']);
                $password=$fm->validate(md5($_POST['password']));
                $email=$fm->validate($_POST['email']);
                $role=$_POST['role'];
                

                //mysql
                $username=mysqli_real_escape_string($db->link,$username);
                $password=mysqli_real_escape_string($db->link,$password);
                $email=mysqli_real_escape_string($db->link,$email);
                $role=mysqli_real_escape_string($db->link,$role);

                if(empty($username) || empty($password) || empty($role)  || empty($email))
                {
                    echo "all field are not empty";
                }
                else{

                    $mailquery="SELECT * FROM db_user WHERE email='$email' limit 1";
                    $mailcheck=$db->select($mailquery);
                    if ($mailcheck != false) {
                        echo "email already exits.";
                    }
                
                else
                   {

                    $query="INSERT INTO db_user(username,email,password,role) VALUES ('$username','$email','$password','$role')";
                   $query=$db->insert($query);
                   if ($query) {
                       echo "ADD user successful";
                   }
                   else
                   {
                    echo "Not successful user";
                   }
                   
                   }
               }
               }

                ?>
                 <form action="" method="post">

                    <table class="form">					
                        <tr>
                            <td>
                                <input type="text" name="username" placeholder="Enter user Name..." class="medium" />
                            </td>
                        </tr>
                          <tr>
                            <td>
                                <input type="email" name="email" placeholder="Enter user email" class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="passsword" name="password" placeholder="Enter password" class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <select class="select"  name="role">
                                    <option value="">...select one...</option>
                                    <option value="admin"> admin </option>
                                    <option value="1">author</option>
                                    <option value="2">editor</option>
                                    
                                </select>
                            </td>
                        </tr>
						<tr> 
                            <td>
                                <input type="submit" name="submit" Value="create" />
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
