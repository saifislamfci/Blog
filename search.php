<?php include("inc/header.php");?>
	<div class="contentsection contemplete clear">
		<div class="maincontent clear">
			<?php 
			if(!isset($_GET['search']) || $_GET['search']== Null)
			{
				header("Location:404.php");
			}
			else{
				$id=$_GET['search'];
			}
			?>
					   <?php
						$query="SELECT * FROM db WHERE title LIKE '%$id%' ";
						$res=$db->select($query);
						if($res)
						{
						while($result=$res->fetch_assoc())
						{
							
						?>
				<div class="samepost clear">
				<h2><a href="post.php?id=<?php echo $result['id'];?>"><?php echo $result['title'];?></a></h2>
				<h4><?php echo $fm->formatdate($result['date']);?>, By <a href="#"><?php echo $result['autor'];?></a></h4>
				 <a href="#"><img src="admin/upload/<?php echo $result['image'];?>" alt="post image"/></a>
				<p>
				<?php echo $fm->textshort($result['body'],200);?>
				</p>
				<div class="readmore clear">
					<a href="post.php?id=<?php echo $result['id'];?>">Read More</a>
				</div>
			</div>
			<?php }}else{echo"No Content this.";}?>
			</div>
<?php include("inc/slidebar.php");?>
			</div>
<?php include("inc/footer.php");?>
<?php include("inc/copyright.php");?>
						
					

