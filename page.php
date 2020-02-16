<?php include("inc/header.php");?>
	<div class="contentsection contemplete clear">
		<div class="maincontent clear">
			<div class="about">
			        <?php 
                        $id =$_GET['pageid'];
                        $Cat="SELECT * FROM pages Where id= '$id'";
                        $query=$db->select($Cat);
                        if($query)
                        {
                            while($result=$query->fetch_assoc())
                            {
                     ?>
				<h2><?php  echo $result['page'];?></h2>
				<p><?php  echo $result['content'];?></p>			
	        </div>
<?php }}else { header("Location:404.php");}?>
		</div>
<?php include("inc/slidebar.php");?>
	</div>
<?php include("inc/footer.php");?>
<?php include("inc/copyright.php");?>