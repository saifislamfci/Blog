<?php include("inc/header.php");?>
			<?php 
			   if(!isset($_GET['id']) || $_GET['id']== Null)
			      {
				    header("Location:404.php");
			      }
			else{
				  $id=$_GET['id'];
			     }
		?>
	<div class="contentsection contemplete clear">
		<div class="maincontent clear">
			<?php 
			$query="SELECT * FROM db WHERE id=$id";
			$post=$db->select($query);
			if($post)
			{
				while ($result = $post->fetch_assoc()) {
					# code...
			?>
			<div class="about">
				 <h2><?php echo $result['title'];?></h2>
				 <h4><?php echo $fm->formatdate($result['date']);?>, By <a href="#"><?php echo $result['autor'];?></a></h4>
				   <img src="admin/upload/<?php echo $result['image'];?>" alt="post image"/>
				 <p>
					<?php echo ($result['body']);?>					
				 </p>		
				<div class="relatedpost clear">
					<h2>Related articles</h2>
					<?php
					 $id=$result['id'];
					 $catid=$result['cat'];
					 $rquery="SELECT * FROM db WHERE cat='$catid' order by rand() limit 2";
					 $rpost=$db->select($rquery);
					if($rpost)
					{
				      while ($rresult = $rpost->fetch_assoc()) {
					?>
					   <a href="post.php?id=<?php echo $result['id'];?>"><img src="admin/upload/<?php echo $rresult['image'];?>" alt="post image"/></a>
					<?php }} 
						else {
						 echo "No Related post";
					} 
					?>
				</div>
	<?php } ?>
	<?php } else{header("Location:404.php");}?>
			</div>
		</div>
	
<?php include("inc/slidebar.php");?>
	</div>
<?php include("inc/footer.php");?>
<?php include("inc/copyright.php");?>